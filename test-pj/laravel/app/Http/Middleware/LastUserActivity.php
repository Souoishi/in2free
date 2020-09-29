<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

class LastUserActivity
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
        // if the user is successfully logged in 
        if(Auth::check()){
            $expiresAt = Carbon::now()->addMinutes(2);
            // this cache expires 2 min later
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
