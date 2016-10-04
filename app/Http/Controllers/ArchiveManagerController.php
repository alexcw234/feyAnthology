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

use DB;
use Response;


class ArchiveManagerController extends Controller
{
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
  public function LoadCatSettings($catID)
  {




  }



}
