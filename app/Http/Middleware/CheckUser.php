<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        if((Auth::user()->role->name != 'User' && $request->route()->getName() != "user.dashboard") ){

            Auth::logout();
            return redirect()->route('login');

        }



        return $next($request);
    }
}
