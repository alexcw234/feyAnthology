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

class ContributorController extends Controller
{
    //
    /**
    * Injects repository
    *
    */
    public function __construct(Request $request, generateFormRepository $generateForm)
    {
          $this->request = $request;
          $this->generateForm = $generateForm;
    }


      /**
      * Gets blank new form
      *
      * @return Response
      */
      public function newWorkFormBlank($typeID)
      {
        $generatedForm = $this->generateForm->generateAddNewForm($typeID);

        return $generatedForm;
      }



}
