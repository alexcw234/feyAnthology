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

  public function getglobalCPTable($userID)
  {



    return Category::select('catID','catName','description')
    ->where('categories.catID','>',1)->get();;



  }



}
 ?>
