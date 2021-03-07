<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OfflineIdleUser
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
        if(Auth::check()) {

            if(Cache::has('user-is-online-'.Auth::user()->id))
            {
                Auth::user()->is_online = 1;
                Auth::user()->save();
            }
            else{
                Auth::user()->is_online = 0;
                Auth::user()->save();
            }
        }

        return $next($request);
    }
}
