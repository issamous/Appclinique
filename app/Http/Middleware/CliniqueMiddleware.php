<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CliniqueMiddleware
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
        if ((Auth::check())) { 
            $user=Auth::user()->role;
            if ($user!=1) {
                return redirect("/dashbord");
            }
            }
        return $next($request);

        
    }
}
