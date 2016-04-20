<?php
namespace App\Repositories;

use App\UGC;
use App\User;
use App\Group;
use App\Category;
use DB;
use Response;
use App\Repositories\UserRepository as UserRepository;

class UGCRepository {

  /**
  * Injects repository
  *
  */
  public function __construct(UserRepository $user)
  {
        $this->user = $user;
  }

  /**
  * Retrieves the user's group/level for the specified category.
  * Returns a collection object containing the level and name of group.
  *
  */
  public function getGroup($catID,$userID)
  {
      return UGC::join('groups','usersgroupscats.groupID','=','groups.groupID')
      ->select('groupName','level')
      ->where('userID','=', $userID)
      ->where('catID','=',$catID)
      ->orderBy('level')
      ->take(1)
      ->get();
  }


  /**
  * Obtains and returns the user's net level for a category.
  * Returns an integer value of the level
  */
  public function getNetlvl($catID, $userID)
  {
      $catobj = $this->getGroup($catID,$userID);
      $globalobj = $this->user->getGlobal($userID);
      $netjson = $this->comparelvl($catobj,$globalobj)->first();


      return $netjson->level;


  }


  /**
  * Sets the user's group for the specified category.
  *
  */
  public function setGroup($catID,$userID)
  {

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
