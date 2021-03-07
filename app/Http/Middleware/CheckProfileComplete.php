<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {

        if (Auth::guard($guard)->check()) {
            if ((Auth::user()->profile_complete == 0)) {
                return redirect()->route('profile-wizard');
            } else {
                return $next($request);
            }
        }



    }
}
