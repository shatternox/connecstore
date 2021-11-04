<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        

        foreach ($guards as $guard) {
            
            if (!(Auth::guard($guard)->check())) {
                return redirect($guard.'/login');
            }
        }
 
        return $next($request);
    }
}
