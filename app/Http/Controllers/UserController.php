<?php

namespace App\Http\Controllers;

use Auth;

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
        * For checking what permissions user has in category
        *
        */
        public function check($catID)
        {
            $user = Auth::user();

            echo "User: " . $user;

            $userID = $user->userID;

            $result = $this->user->getGroup($catID,$userID);

            return $result->toJson();
        }



}
