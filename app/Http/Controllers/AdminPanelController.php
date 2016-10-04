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
    $selectedInfo;

    $userID_select = $this->request->get('userID');
    $catID_select = $this->request->get('catID');
    $groupID_select = $this->request->get('groupID');

    $username_select;
    $catName_select;
    $groupName_select;

    $catName_current;
    $groupID_current;
    $groupName_current;

    $confirmThisString;

    //Error handling
    if ($userID_select < 1 || $groupID_select < 1 || $catID_select < 1)
    {
      $confirmThisString = "Error: Not all fields specified.";
      return view('groupspanel_error')->with('confirmThisString',$confirmThisString);
    }
    if ($userID_select == 1)
    {
      $confirmThisString = "Error: Cannot change permissions of superadmin account.";
      return view('groupspanel_error')->with('confirmThisString',$confirmThisString);
    }
    if ($groupID_select < 2)
    {
      $confirmThisString = "Error: Only 1 superadmin allowed.";
      return view('groupspanel_error')->with('confirmThisString',$confirmThisString);
    }



    if ($catID_select == 1) //If global category
    {

      $selectedInfo = User::select('userID','username','globalID as groupID')->where('userID','=',$userID_select)->get();

      $username_select = $selectedInfo->pluck('username')->first();
      $catName_select = "Global";
      $groupName_select = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_select)
                                            ->get()->pluck('groupName')->first();

      $catName_current = "Global";
      $groupID_current = $selectedInfo->pluck('groupID')->first();

      $groupName_current = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_current)
                                 ->get()->pluck('groupName')->first();

      $confirmThisString = "Confirm change of group for user globally?";

      $returnarr = array(
                      'userID_select'=>$userID_select,
                      'catID_select' => $catID_select,
                      'groupID_select' => $groupID_select,
                      'username_select'=>$username_select,
                      'catName_select' => $catName_select,
                      'groupName_select' => $groupName_select,
                      'groupID_current' => $groupID_current,
                      'groupName_current' => $groupName_current,
                    );
      return view('groupspanel_confirmation')->with($returnarr)->with('confirmThisString',$confirmThisString);
    }
    else if ($catID_select > 1) //If not global category
    {
        $selectedInfo  = UGC::join('categories','categories.catID','=','usersgroupscats.catID')
        ->join('users','users.userID','=','usersgroupscats.userID')
        ->join('groups','groups.groupID','=','usersgroupscats.groupID')
        ->select('users.username','users.userID','users.globalID','categories.catID','categories.catName','groups.groupID','groups.groupName')
        ->where('users.userID','=',$userID_select)->where('categories.catID','=',$catID_select)->get();

        if(!$selectedInfo->isEmpty()) // User is in category.
        {
          $username_select = $selectedInfo->pluck('username')->first();
          $catName_select = $selectedInfo->pluck('catName')->first();
          $groupName_select = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_select)
                                                ->get()->pluck('groupName')->first();

          $groupID_current = $selectedInfo->pluck('groupID')->first();
          $groupName_current = $selectedInfo->pluck('groupName')->first();

          $confirmThisString = "Confirm change of group for this user in $catName_select?";
       }
       else // User not in category
       {
          $username_select = User::select('users.userID','users.username')->where('users.userID','=',$userID_select)
                            ->get()->pluck('username')->first();
          $catName_select = Category::select('categories.catID','categories.catName')->where('categories.catID','=',$catID_select)
                            ->get()->pluck('catName')->first();
          $groupName_select = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_select)
                                     ->get()->pluck('groupName')->first();

          $groupName_select = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_select)
                                                ->get()->pluck('groupName')->first();
          $groupID_current = 7;
          $groupName_current = 'None';

          $confirmThisString = "Add user to $catName_select at the specified level?";
       }


       $returnarr = array(
                       'userID_select'=>$userID_select,
                       'catID_select' => $catID_select,
                       'groupID_select' => $groupID_select,
                       'username_select'=>$username_select,
                       'catName_select' => $catName_select,
                       'groupName_select' => $groupName_select,
                       'groupID_current' => $groupID_current,
                       'groupName_current' => $groupName_current,
                     );
       return view('groupspanel_confirmation')->with($returnarr)->with('confirmThisString',$confirmThisString);
    }
    else
    {
      $confirmThisString = "Error, invalid category specified.";
      return view('groupspanel')->with('confirmThisString',$confirmThisString);
    }


  }





}
