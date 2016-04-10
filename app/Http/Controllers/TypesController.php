<?php

namespace App\Http\Controllers;

use App\Type;
use DB;
use Response;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Routing\Controller;

class TypesController extends Controller
{
    //

    /**
   * Will display listing of Types.
   *
   * @return Response
   */
   public function index()
   {
     $types = Type::select('contentType','expectedFields')->get();


     return $types->toJson();

   }



}
