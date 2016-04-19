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
      ->select('categories.catID','catName','description','groups.groupName','level')

      ->where(function($query) use ($userID) {

          if(!UGC::join('groups','usersgroupscats.groupID','=','groups.groupID')
          ->select('groups.level')->where('catID','=',1)->where('userID','=',$userID)
          ->where('groups.level','>',77)->get()->isEmpty())
          {
            $query->where('categories.catID','>',1);
          }
          else
          {
            $query->where('userID','=',$userID)->where('categories.catID','>',1);
          }
      })
      ->get();

  }





}
 ?>
