<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
  public function __construct(WorksRepository $work, Request $request)
  {
        $this->work = $work;
        $this->request = $request;
  }

  /**
 * Will display selection of works.
 *
 * @return Response
 */
public function index($catID)
{

  $infos = $this->request->except('tags');

  $tags = explode(',', $this->request->get('tags'));



  $list = $this->work->retrieve($catID, $infos, $tags);

  return $list->toJson();

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
