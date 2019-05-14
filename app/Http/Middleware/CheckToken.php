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

        if (! $token) {
            if ($page == 'login' || $page == 'register' || $page == 'password_request' || $page == 'password_reset') {
                return $next($request);
            }

            return redirect('login');
        }


        if ($page == 'login' || $page == 'register' || $page == 'password_request' || $page == 'password_reset') {
            return redirect('/user/profile');
        }

        return $next($request);
    }
}
