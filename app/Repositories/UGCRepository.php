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
      return UGC::join('groups','usersgroupscats.groupID','=','groups.groupID')
      ->select('level')
      ->where('userID','=', $userID)
      ->where('catID','=',$catID)
      ->orderBy('level')
      ->take(1)
      ->get();
  }

  /**
  * Retrieves the user's group for global.
  *
  */
  public function getGlobal($userID)
  {
      return UGC::join('groups','usersgroupscats.groupID','=','groups.groupID')
      ->select('level')
      ->where('userID','=', $userID)
      ->where('catID','=',1)
      ->orderBy('level')
      ->take(1)
      ->get();
  }

  /**
  * Compares global and category level and returns net level
  *
  * @return : The object that is determined to contain net level
  */
  public function comparelvl($catobj, $globalobj)
  {
      $result = NULL;

      if (!$catobj->isEmpty())
      {
          $catlvl = $catobj->first();
          $globallvl = $globalobj->first();

          echo "not null cat";

          if ($globallvl < 44 || $globallvl >= 77)
          {
            $result = $globalobj;
          }
          else
          {
            $result = $catobj;
          }
      }
      else
      {
      echo "null cat";
      echo $globalobj;

      $result = $globalobj;
      }
      return $result;
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
