<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


use App\Repositories\worksrepository as WorksRepository;

use DB;
use Response;

class WorksController extends Controller
{

  private $work;

  /**
  * Injects repository
  *
  */
  public function __construct(WorksRepository $work)
  {
        $this->work = $work;
  }

  /**
 * Will display all works for a category.
 *
 * @return Response
 */
public function index($catID)
{
/*
  Query builder version for reference:

  $worksfromcat = DB::table('works')
  ->select('workID','catID','typeID','url','info','tags')
  ->where('catID','=',$catID)
  ->where('approved',true)
  ->get();

  return Response::json($worksfromcat);
*/

  $list = $this->work->getallworks($catID);

  return $list->toJson();
}

/**
* Will display all works for a category that satisfy query.
*
* @return Response
*/
public function retrieve($catID, $infoReq, $tagReq)
{



  $worksfromcat = Work::
  select('workID','catID','typeID','url','info','tags')
  ->where('catID','=',$catID)
  ->where('approved',true)
  ->where(function($query) use ($infoReq){



  })
  ->where(function($query) use ($tagReq){


//      $query->orWhere(, '=', );



  })
  ->get();

return $worksfromcat->toJson();
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
