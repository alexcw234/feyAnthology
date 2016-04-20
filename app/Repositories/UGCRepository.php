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
  * Sets the user's group for the specified category.
  *
  */
  public function setGroup($catID,$userID)
  {

  }




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
  * Compares global and category level and returns net level
  *
  * @return : The object that is determined to contain net level
  */
  public function comparelvl($catobj, $globalobj)
  {
      $result;

      if (!$catobj->isEmpty())
      {
          $catlvl = $catobj->pluck('level')->first();
          $globallvl = $globalobj->pluck('level')->first();

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
      $result = $globalobj;
      }
      return $result;
  }



}



?>
