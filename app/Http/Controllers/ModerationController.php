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

class ModerationController extends Controller
{
    //
    /**
    * Injects repository
    *
    */
    public function __construct(Request $request)
    {
          $this->request = $request;
    }


      /**
      * Loads settings for the specified category
      *
      * @return Response
      */
      public function LoadWorkToEdit($workID)
      {
        $selectedWork = Work::where('workID','=',$workID)->get();

        //Use this for tags: https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/
        return ;
      }



}
