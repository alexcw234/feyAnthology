<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\UGC;

use App\Repositories\UGCRepository as UGCRepository;
use App\Repositories\UserRepository as UserRepository;

class UGCController extends Controller
{

    private $ugc;

    /**
    * Injects repository
    *
    */
    public function __construct(UGCRepository $ugc, UserRepository $user, Request $request)
    {
          $this->ugc = $ugc;
          $this->user = $user;
          $this->request = $request;
    }


    /**
    * For checking what permissions user has, and returns catgroup, globalgroup
    * (For purposes of display only)
    * (Yes that Auth::chekc() is necessary since is public route)
    */
    public function check($catID)
    {
        $result = json_encode(['level' => 0]);

        if (Auth::check())
        {
        $userID = Auth::user()->userID;
        $catobj = $this->ugc->getGroup($catID,$userID);
        $globalobj = $this->user->getGlobal($userID);

        $result = $this->ugc->comparelvl($catobj,$globalobj)->first()->toJson();
        }

        return $result;
    }


    /**
    * For specifically checking the user's global level.
    * (For purposes of display only)
    * (Yes that Auth::check() is necessary since is public route)
    */
    public function checkGlobal()
    {
        $result = json_encode(['level' => 0]);

        if (Auth::check())
        {
        $userID = Auth::user()->userID;
        $result = $this->user->getGlobal($userID)->first()->toJson();
        }
        return $result;
    }


    /**
    * Promotes a contributor or contributor+ to Moderator
    *
    */
    public function ContributortoMod($catID, $userID)
    {

            $myID = Auth::user()->userID;
            $result = json_encode(['success' => "false"]);

            if ($this->ugc->getNetlvl($catID, $myID) > 66)
            {
                $theuserslevel = $this->ugc->getGroup($catID,$userID)->pluck('level')->first();

                if ($theuserslevel > 50 && $theuserslevel < 70)
                {
                    $result = $this->ugc->setGroup($catID, $userID, 4);
                }

                return $result;
            }

    }

    /**
    * Demotes Moderator to Contributor
    *
    */
    public function ModtoContributor($catID, $userID)
    {

            $myID = Auth::user()->userID;
            $result = json_encode(['success' => "false"]);

            if ($this->ugc->getNetlvl($catID, $myID) > 66)
            {
                $theuserslevel = $this->ugc->getGroup($catID,$userID)->pluck('level')->first();

                if ($theuserslevel > 70 && $theuserslevel < 80)
                {
                    $result = $this->ugc->setGroup($catID, $userID, 6);
                }

                return $result;
            }

    }

  /**
   * Adds User to category
   *
   * @return Response
   */
  public function join_cat($catID)
  {
      $userID = Auth::user()->userID;

      $exists = UGC::where('catID',$catID)->where('userID',$userID)->count();

      if ($exists == 0)
      {
          $newUGC = UGC::create([
            'userID' => $userID,
            'catID' => $catID,
          ]);
          $newUGC->groupID = 6;
          $newUGC->save();
          return $newUGC;
      
      }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      //
  }

}
