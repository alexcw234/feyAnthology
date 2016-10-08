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


use App\Repositories\siteTextRepository as siteTextRepository;

class AdminPanelController extends Controller
{
  /**
  * Injects repository
  *
  */
  public function __construct(Request $request, siteTextRepository $siteText)
  {
        $this->request = $request;
        $this->siteText = $siteText;
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
                      'catName_current' => $catName_current,
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

        if(!$selectedInfo->isEmpty() && $selectedInfo->pluck('groupID')->first() != 7) // User is in category.
        {
          $username_select = $selectedInfo->pluck('username')->first();
          $catName_select = $selectedInfo->pluck('catName')->first();
          $groupName_select = Group::select('groups.groupID','groups.groupName')->where('groups.groupID','=',$groupID_select)
                                                ->get()->pluck('groupName')->first();


          $groupID_current = $selectedInfo->pluck('groupID')->first();
          $groupName_current = $selectedInfo->pluck('groupName')->first();

          $catName_current = $catName_select;

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
          $catName_current = "N/A";

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
                       'catName_current' => $catName_current,
                       'groupID_current' => $groupID_current,
                       'groupName_current' => $groupName_current,
                     );
       return view('groupspanel_confirmation')->with($returnarr)->with('confirmThisString',$confirmThisString);
    }
    else
    {
      $confirmThisString = "Error, invalid category specified.";
      return view('groupspanel_error')->with('confirmThisString',$confirmThisString);
    }


  }



    /**
    * Alters the user's permissions based on the parameters
    *
    * @return Response
    */
    public function SuperAlterUGC()
    {

      $userID_select = $this->request->get('userID_select');
      $catID_select = $this->request->get('catID_select');
      $groupID_select = $this->request->get('groupID_select');
      $confirmThisString = "";

      if ($userID_select < 2 || $groupID_select < 2)
      {
        $confirmThisString = "Oops, something went wrong, please try again.";
        return view('groupspanel_error')->with('confirmThisString',$confirmThisString);
      }

      if ($catID_select == 1) // Alters user's global permissions
      {
        $user_current = User::find($userID_select);
        $user_current->globalID = $groupID_select;
        $user_current->save();
        $confirmThisString = "Successfully modified user permissions.";
        return view('groupspanel_success')->with('confirmThisString',$confirmThisString);
      }
      else
      {
        $selectedInfo  = UGC::join('categories','categories.catID','=','usersgroupscats.catID')
        ->join('users','users.userID','=','usersgroupscats.userID')
        ->join('groups','groups.groupID','=','usersgroupscats.groupID')
        ->select('usersgroupscats.ugcID','users.username','users.userID','users.globalID','categories.catID','categories.catName','groups.groupID','groups.groupName')
        ->where('users.userID','=',$userID_select)->where('categories.catID','=',$catID_select)->get();


        if(!$selectedInfo->isEmpty()) //Alters user's permissions in category
        {
          $ugcID = $selectedInfo->pluck('ugcID')->first();
          $ugc_current = UGC::find($ugcID);
          $ugc_current->groupID = $groupID_select;
          $ugc_current->save();
          $confirmThisString = "Successfully modified user permissions.";
          return view('groupspanel_success')->with('confirmThisString',$confirmThisString);

        }
        else // Adds user to category with selected permissions.
        {
          $newUGC = UGC::create([
            'userID' => $userID_select,
            'catID' => $catID_select,
          ]);
          $newUGC->groupID = $groupID_select;
          $newUGC->save();
          $confirmThisString = "Successfully modified user permissions (new UGC entry added).";
          return view('groupspanel_success')->with('confirmThisString',$confirmThisString);
        }

      }

    }

    /**
    * Gets data for the site settings menu.
    *
    * @return Response
    */
    public function sitesettings_getmenu()
    {
      $defaultCat = $this->siteText->loadDefault();
      $headertext = $this->siteText->loadHeader($defaultCat);
      $frontpage_description = $this->siteText->loadFront($defaultCat);
      $updates = $this->siteText->loadUpdates($defaultCat);
      $about = $this->siteText->loadAbout($defaultCat);

      return view('sitesettings')->with('headertext',$headertext)
      ->with('frontpage_description',$frontpage_description)
      ->with('updates',$updates)->with('about',$about);
    }

    /**
    * Saves the site settings.
    *
    * @return Response
    */
    public function sitesettings_save()
    {
      $header = $this->request->get('header');
      $frontpage_description = $this->request->get('frontpage_description');
      $updates = $this->request->get('updates');
      $about = $this->request->get('about');

      return view('sitesettings_super')->with('updates',$updates)
      ->with('about',$about);
    }

    private function sanitizeHTMLTags($input)
    {
      
    }



}
