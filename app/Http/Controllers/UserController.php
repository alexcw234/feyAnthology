<?php

namespace App\Http\Controllers;

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


        
}
