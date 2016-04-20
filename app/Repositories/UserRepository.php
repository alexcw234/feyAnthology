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
  * Retrieves the user's group for global.
  *
  */
  public function getGlobal($userID)
  {
      return User::join('groups','user.globalID','=','groups.groupID')
      ->select('level')
      ->where('userID','=', $userID)
      ->orderBy('level')
      ->take(1)
      ->get();
  }



    /**
    * Sets the user's group for global.
    *
    */
    public function setGlobal($userID)
    {

    }



}






 ?>
