<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class InProgress
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
        if($request->route()->getName() != "in-progress"){
            if (Auth::user()->in_progress == "In Progress") {
                return redirect()->route('in-progress');
            }
        }
        if($request->route()->getName() == "in-progress"){
            if (Auth::user()->in_progress == "Completed") {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
