<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        if((Auth::user()->role->name == 'User' && $request->route()->getName() != "user.Dashboard") ||  (Auth::user()->role->name == 'Admin' && $request->route()->getName() == "home")){
            return redirect()->route('user.dashboard');
        }
        return $next($request);
    }
}
