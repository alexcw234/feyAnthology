<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use DB;
use Response;

class CatsController extends Controller
{
    //

    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $allCats = DB::table('categories')->select('catID','catName','description')->get();
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
      ->where('catID','=',$catID)->get();
       return Response::json($selectcat);
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
