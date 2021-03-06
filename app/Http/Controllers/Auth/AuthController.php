<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UGC;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['username'] = mb_strtolower($data['username'],'UTF-8');
        $data['email'] = mb_strtolower($data['email'],'UTF-8');

        return Validator::make($data, [
//            'name' => 'required|max:255',
            'username' => 'required|max:50|unique:users,username_lower',
            'email' => 'required|email|max:255|unique:users,email_lower',
            'password' => 'required|min:6|confirmed',
            'captcha' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
//            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'username_lower' => $data['username'],
            'email_lower' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $id = $user->getkey();
        $ugc = UGC::create([
            'userID' => $id,
        ]);

        return $user;
    }
}
