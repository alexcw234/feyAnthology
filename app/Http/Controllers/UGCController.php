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
    * For checking what permissions user has in category
    *
    */
    public function check($catID)
    {
        if (Auth::check()) {

        $userID = Auth::user()->userID;

        $catgroup = $this->ugc->getGroup($catID,$userID);

        $globalgroup = $this->ugc->getGlobal($userID);



        return true;
        }
        else
        {
        return false;
        }

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
