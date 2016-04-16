<?php
namespace App\Repositories;

use App\UGC;
use App\User;
use App\Group;
use App\Category;
use DB;
use Response;

class UGCRepository {


  /**
  * Retrieves the user's group for the specified category.
  *
  */
  public function getGroup($catID,$userID)
  {
      return UGC::select('groupID')
      ->where('userID','=', $userID)
      ->where('catID','=',$catID)
      ->orderBy('groupID','desc')
      ->take(1)
      ->get();
  }

  /**
  * Retrieves the user's group for global.
  *
  */
  public function getGlobal($userID)
  {
      return UGC::join('categories','usersgroupscats.catID','=','categories.catID')
      ->select(DB::raw("'groupID' as 'globalID'"))
      ->where('userID','=', $userID)
      ->where('catName','=','Global')
      ->orderBy('groupID','desc')
      ->take(1)
      ->get();
  }

  /**
  * Sets the user's group for the specified category.
  *
  */
  public function setGroup($catID,$userID)
  {

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
