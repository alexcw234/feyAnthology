<?php

namespace App\Http\Controllers;

use Auth;
use App\UGC;
use App\User;
use App\Group;
use App\Category;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Routing\Controller;

use App\Repositories\UserRepository as UserRepository;

class UserController extends Controller
{
    //
        private $user;

        /**
        * Injects repository
        *
        */
        public function __construct(UserRepository $user, Request $request)
        {
              $this->user = $user;
              $this->request = $request;
        }


        /**
       * Will display selection of users by catID.
       *
       * @return Response
       */
      public function indexbyID($catID)
      {
          return User::select('users.userID','username',DB::raw("COUNT('works.subID') as contributions"),'groups.groupID','groupName')
          ->leftJoin('works',function($join) use ($catID)
          {
              $join->on('users.userID','=','works.subID')
              ->where('works.catID','=', $catID)
              ->where('works.approved','=',true);
          })
          ->join('usersgroupscats','users.userID','=','usersgroupscats.userID')
          ->join('categories','usersgroupscats.catID','=','categories.catID')
          ->join('groups','usersgroupscats.groupID','=','groups.groupID')
          ->groupBy('users.userID','username','groups.groupID','groupName')
          ->where('usersgroupscats.catID','=',$catID)
          ->get()->toJson();

      }



}
