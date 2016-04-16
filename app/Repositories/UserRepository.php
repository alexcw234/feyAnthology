<?php

namespace App\Repositories;

use App\UGC;
use App\User;
use App\Group;
use App\Category;
use DB;
use Response;

class UserRepository {

  /**
  * Retrieves the user's group for the specified category.
  *
  */
  public function getGroup($catID,$userID)
  {

      return User::join('usersgroupscats', 'users.userID', '=', 'usersgroupscats.userID')
      ->join('groups','usersgroupscats.groupID','=','groups.groupID')
      ->select('group.groupID','groupName')
      ->where('user.userID','=', $userID)
      ->where('catID','=',$catID)->get();
  }





}






 ?>
