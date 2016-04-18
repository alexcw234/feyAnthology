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
      return Category::join('usersgroupscats','categories.catID','=','usersgroupscats.catID')
      ->join('groups','usersgroupscats.groupID','=','groups.groupID')
      ->select('categories.catID','catName','description','groups.groupName','level')
      ->where('userID','=',$userID)->where('categories.catID','>',1)
      ->get();

  }





}
 ?>
