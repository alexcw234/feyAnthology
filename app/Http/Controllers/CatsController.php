<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use App\Repositories\UGCRepository as UGCRepository;
use App\Repositories\categoryrepository as CategoryRepository;
use App\Repositories\UserRepository as UserRepository;

use DB;
use Response;

class CatsController extends Controller
{
    //


    /**
    * Injects repository
    *
    */
    public function __construct(CategoryRepository $category, UGCRepository $ugc, UserRepository $user, Request $request)
    {
          $this->ugc = $ugc;
          $this->category = $category;
          $this->request = $request;
          $this->user = $user;
    }


    /**
   * Display a listing of all categories.
   *
   * @return Response
   */
  public function index()
  {
      $allCats = DB::table('categories')->select('catID','catName','description','options')
      ->where('catID', '>', 1)->orderBy('catID')->get();
      return Response::json($allCats);
  }

  /**
   * Display the information about one category.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($catID)
  {
      $selectcat = DB::table('categories')->select('catID','catName','description','options')
      ->where('catID','=',$catID)->first();
       return Response::json($selectcat);
  }


  /**
 * Display a listing of all categories for the user.
 *
 * @return Response
 */
public function userCP_index()
{

      $userID = Auth::user()->userID;

        $globalobject = $this->user->getGlobal($userID);
        $globallevel = $globalobject->pluck('level')->first();

        if ($globallevel > 90)
        {
          $result = $this->category->getglobalCPTable($userID, $globalobject);
        }
        else
        {
          $result = $this->category->getuserCPTable($userID);
        }

    return $result->toJson();

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
