<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\UGC;
use App\User;
use App\Group;
use App\Category;
use App\Work;
use App\Repositories\UserRepository as UserRepository;


class authModerator
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
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $goodLevel = 77;

        $userID = Auth::user()->userID;
        $globallvl = $this->user->getGlobal($userID)->pluck('level')->first();

        if ($globallvl >= $goodLevel)
        {
          return $next($request);
        }
        else {

              $moddedCats = UGC::join('groups','usersgroupscats.groupID','=','groups.groupID')
              ->where('usersgroupscats.userID','=',$userID)
              ->where('groups.level','>=',$goodLevel)->get()->pluck('catID')->toArray();

              if ($request->route('catID'))
              {
                  if (in_array($request->route('catID'),$moddedCats))
                  {
                    return $next($request);
                  }
              }
              else if ($request->route('workID'))
              {
                  if (in_array(Work::where('workID','=',$request->route('workID'))->get()->pluck('catID')->first(),$moddedCats))
                  {
                    return $next($request);
                  }
              }
              else if ($request->has('catID'))
              {
                  if (in_array($request->get('catID'),$moddedCats))
                  {
                    return $next($request);
                  }
              }
              else if ($request->has('workID'))
              {
                  if (in_array(Work::where('workID','=',$request->get('workID'))->get()->pluck('catID')->first(),$moddedCats))
                  {
                    return $next($request);
                  }
              }

              // If not mod
              if ($request->ajax() || $request->wantsJson()) {
                  return response('Unauthorized.', 401);
              } else {
                  return redirect()->guest('login');
              }
        }
    }
}
