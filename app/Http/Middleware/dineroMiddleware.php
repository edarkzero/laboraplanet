<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Auth;
use Session;
class dineroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        echo config('global.global')."sad";exit();
        // $bag = Session::all();
        // print_r(json_encode($bag));
        // print_r("<br>".Auth::user());}
        // exit();
        // $max = config('session.tiempo')*10;
        // if (($bag && $max <(time()-$bag->getLast))) {
        //     # code...
        // }
        // // if (Auth::guard($guard)->check()) {
        //     // print_r("sd");exit();
        //     return redirect('/');
        // // }

        return $next($request);
    }
}
