<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository as UserRepository;

class authSuperAdmin
{

  /**
  * Injects repository
  *
  */
  public function __construct(UserRepository $user)
  {
        $this->user = $user;
  }
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */
  public function handle($request, Closure $next, $guard = null)
  {
      if (Auth::guard($guard)->guest()) {
          if ($request->ajax() || $request->wantsJson()) {
              return response('Unauthorized.', 401);
          } else {
              return redirect()->guest('login');
          }
      }
      else
      {
          $userID = Auth::user()->userID;
          $globallvl = $this->user->getGlobal($userID)->pluck('level')->first();

          if ($userID > 1 || $globallvl < 99)
          {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
          }
      }

      return $next($request);
  }
}
