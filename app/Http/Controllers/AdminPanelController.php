<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use DB;
use Response;




class AdminPanelController extends Controller
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
  * Gets data for the user permissions menu
  *
  * @return Response
  */
  public function userperms_getmenu()
  {

    $users = DB::table('users')->select('userID','username', 'globalID')->orderBy('username')->get();
    $categories = DB::table('categories')->select('catID','catName')->get();
    $groups = DB::table('groups')->select('groupID','groupName','level')->where('groupName','!=','superadmin')->get();

    return view('groupspanel')->with('users',$users)->with('categories', $categories)->with('groups',$groups);

  }


  /**
  * Gets data for the user selected in the permissions menu.
  *
  * @return Response
  */
  public function userperms_getselection()
  {

    $ugcInfo = DB::table('usersgroupscats')->join('categories','categories.catID','=','usersgroupscats.catID')
    ->join('users','users.userID','=','usersgroupscats.userID')
    ->join('groups','groups.groupID','=','usersgroupscats.groupID')
    ->select('users.userName','users.userID','users.globalID','categories.catID','categories.catName','groups.groupID','groups.groupName')
    ->where('users.userID','=',)->get();

    $confirmThisString = "Current role for User: $username in Category: $catName is $groupName_current";

      return view('groupspanel');

  }





}
