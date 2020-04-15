<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckUserMiddleware
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
        if(Auth::check() && auth()->user()->is_admin == 0)
        {
            return $next($request);
        }
            return redirect('auth.login')->with('error','Please login to access this page.');
    }
}
