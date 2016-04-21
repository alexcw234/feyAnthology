<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use App\Repositories\worksrepository as WorksRepository;
use App\Repositories\UGCRepository as UGCRepository;


use DB;
use Response;

class WorksController extends Controller
{

  private $work;

  /**
  * Injects repository
  *
  */
  public function __construct(WorksRepository $work, UGCRepository $ugc, Request $request)
  {
        $this->work = $work;
        $this->ugc = $ugc;
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
      $result = json_encode(['status' => 'failure']);

      if (Auth::check())
      {

        $userID = Auth::user()->userID;

        $input = $this->request->getContent();
        $infos = $this->request->except('typeID','tags', 'URL', 'Rules', 'catID');
        $catID = $this->request->get('catID');
        $address = $this->request->get('URL');
        $tags = $this->request->get('tags');
        $typeID = $this->request->get('typeID');

        $netlvl = $this->ugc->getNetlvl($catID, $userID);
        if ($netlvl > 55)
        {
            $valid = $this->work->forceentry($catID, $infos, $address, $typeID, $tags, $userID);
            $result = json_encode(['status' => 'override']);
        }
        else if ($netlvl == 55)
        {
            $valid = $this->work->newentry($catID, $infos, $address, $typeID, $tags, $userID);
            $result = json_encode(['status' => 'success']);
        }
      }

    return $result;
}


/**
 * Retrieves pending works for the category.
 *
 * @return Response
 */
public function pending($catID)
{
      if (Auth::check())
      {
          $userID = Auth::user()->userID;

          if ($this->ugc->getNetlvl($catID, $userID) > 55)
          {
              $result = $this->work->getpendingworks($catID);
          }
          return $result->toJson();
      }
}

/**
 * Sets work approval status.
 *
 * @param  int  $id
 * @return Response
 */
public function setApproval()
{
    if (Auth::check())
    {
        $userID = Auth::user()->userID;
        $input = $this->request->getContent();
        $catID = $this->request->get('catID');

        if ($this->ugc->getNetlvl($catID, $userID) > 55)
        {
            $approval = $this->request->get('isapproved');
            $workID = $this->request->get('workID');
            $comment = $this->request->get('comment');


            $this->work->setApproval($workID,$userID,$approval,$comment);
        }
    }

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
