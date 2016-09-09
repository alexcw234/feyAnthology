<?php

namespace App\Repositories;

use App\UGC;
use App\User;
use App\Group;
use App\Category;
use DB;
use Response;

class CategoryRepository {



  public function getuserCPTable($userID)
  {
/// Currently broken fix this
      return Category::join('usersgroupscats','categories.catID','=','usersgroupscats.catID', 'left outer')
      ->join('groups','usersgroupscats.groupID','=','groups.groupID', 'left outer')
      ->select('usersgroupscats.catID','catName','description','groups.groupName','level')
      ->where('userID','=',$userID)->where('categories.catID','>',1)
      ->get();

  }

  public function getglobalCPTable($userID, $globalobject)
  {
    $categorylisting = Category::join('usersgroupscats','categories.catID','=','usersgroupscats.catID', 'left outer')
    ->join('groups','usersgroupscats.groupID','=','groups.groupID', 'left outer')
    ->select('categories.catID','catName','description','groups.groupName','level')
    ->wherenull('userID')->orwhere('userID','=',$userID)->where('categories.catID','>',1)
    ->orderBy('groups.groupName','ASC')->orderBy('categories.catID','ASC')
    ->get();

    $globallevel = $globalobject->pluck('level')->first();

    $modifiedlisting = $categorylisting->map(function ($row, $key) use ($globallevel)
    {

          if ($row['groupName'] != null)
          {
              $row['groupName'] = "(" . $row['groupName'] . ")";
          }

          $row['level'] = $globallevel;

          return $row;
    });

    return $modifiedlisting;

//    ->select('categories.catID','catName','description','groups.groupName','level')
//    ->where('userID','=',$userID)->where('categories.catID','>',1)->get();

    }



}
 ?>
