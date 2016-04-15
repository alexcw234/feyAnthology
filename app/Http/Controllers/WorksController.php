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

  $infos = $this->request->except('Type','tags'); //It's an array already, no need for explode

  $tags = explode(',', $this->request->get('tags'));

  $type = $this->request->get('Type');

  $list = $this->work->retrieve($catID, $infos, $type, $tags);

  return $list->toJson();

}

/**
 * Validates and stores a new record in the database.
 *
 * @return Response
 */
public function store()
{

    $input = $this->request->getContent();

    $infos = $this->request->except('typeID','tags', 'URL', 'Rules', 'catID');

    $catID = $this->request->get('catID');

    $address = $this->request->get('URL');

    $tags = $this->request->get('tags');

    $typeID = $this->request->get('typeID');

    $valid = $this->work->newentry($catID, $infos, $address, $typeID, $tags);

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
