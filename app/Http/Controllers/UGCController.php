<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
    * (For purposes of display only, for authentication use in-controller
    * authentication)
    */
    public function check($catID)
    {
        $result = json_encode(['level' => 0]);

        if (Auth::check())
        {

        $userID = Auth::user()->userID;
        $catobj = $this->ugc->getGroup($catID,$userID);
        $globalobj = $this->ugc->getGlobal($userID);

        $result = $this->ugc->comparelvl($catobj,$globalobj)->toJson();

        }
        return $result;
    }




    /**
   * Will display selection of works.
   *
   * @return Response
   */
  public function index($catID)
  {

  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      //
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
