<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        $page = \Route::current()->getName();
        $token = isset($_COOKIE['bl_token']) ? $_COOKIE['bl_token'] : null;

        if ($page == 'login' && !$token) {

            return $next($request);
        }

        if ($page == 'register' && !$token) {

            return $next($request);
        }

        // other page
        if (!$token) {

            return redirect('login');
        }

        if ($page == 'login' || $page == 'register') {

            return redirect('home');
        }

        return $next($request);
    }
}
