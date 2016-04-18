<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use App\Repositories\UGCRepository as UGCRepository;
use App\Repositories\categoryrepository as CategoryRepository;

use DB;
use Response;

class CatsController extends Controller
{
    //


    /**
    * Injects repository
    *
    */
    public function __construct(CategoryRepository $category, UGCRepository $ugc, Request $request)
    {
          $this->ugc = $ugc;
          $this->category = $category;
          $this->request = $request;
    }


    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $allCats = DB::table('categories')->select('catID','catName','description')
      ->where('catID', '>', 1)->get();
      return Response::json($allCats);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($catID)
  {
      $selectcat = DB::table('categories')->select('catID','catName','description')
      ->where('catID','=',$catID)->first();
       return Response::json($selectcat);
  }


  /**
 * Display a listing of the resource.
 *
 * @return Response
 */
public function userCP_index()
{

    if (Auth::check())
    {
      $userID = Auth::user()->userID;

      $result = $this->category->getuserCPTable($userID);

    return $result->toJson();

    }
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
