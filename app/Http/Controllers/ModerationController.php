<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use App\UGC;
use App\Group;
use App\User;
use App\Category;
use App\Work;

use DB;
use Response;

use App\Repositories\generateFormRepository as generateFormRepository;
use App\Repositories\worksrepository as WorksRepository;
use App\Repositories\UGCRepository as UGCRepository;


class ModerationController extends Controller
{
    //
    /**
    * Injects repository
    *
    */
    public function __construct(Request $request, generateFormRepository $generateForm, WorksRepository $work, UGCRepository $ugc)
    {
          $this->request = $request;
          $this->generateForm = $generateForm;
          $this->work = $work;
          $this->ugc = $ugc;
    }


    /**
    * Loads settings for the specified category
    *
    * @return Response
    */
    public function LoadWorkToEdit($workID)
    {
      $selectedWork = Work::where('workID','=',$workID)->get();

      $returnWork = $selectedWork->toJson();

      return $returnWork;
    }

    /**
    * Edits the selected work
    *
    */
    public function EditThisWork()
    {
        $result = json_encode(['status' => 'failure']);

        $userID = Auth::user()->userID;

        $input = $this->request->getContent();
        $infos = $this->request->except('workID','typeID','tags', 'URL', 'Rules', 'catID');

        $workID = $this->request->get('workID');
        $catID = $this->request->get('catID');
        $address = $this->request->get('URL');
        $tags = $this->request->get('tags');
        $typeID = $this->request->get('typeID');

        $netlvl = $this->ugc->getNetlvl($catID, $userID);
        if ($netlvl > 55)
        {
            $valid = $this->work->update($workID, $catID, $infos, $address, $typeID, $tags, $userID);
            $result = json_encode(['status' => 'override']);
        }

    return $result;
   }

    /**
    * Deletes the selected work
    */
    public function DeleteThisWork()
    {
      $result = json_encode(['status' => 'override']);
      $workID = $this->request->get('workID');
      Work::where('workID',$workID)->delete();
      return $result;

    }

    /*
    * Adds selected work to Feature rotation
    *
    */
    public function FeatureThisWork()
    {
          $workID = $this->request->get('workID');
          $work = Work::find($workID);
          $work->featured = true;
          $work->save();
          return json_encode(['status' => 'success']);
    }

    /*
    * Removes selected work from Feature rotation
    *
    */
    public function UnfeatureThisWork()
    {
      $workID = $this->request->get('workID');
      $work = Work::find($workID);
      $work->featured = false;
      $work->save();
      return json_encode(['status' => 'success']);

    }

}
