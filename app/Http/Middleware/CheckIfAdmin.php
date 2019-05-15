<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class CheckIfAdmin
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
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (! $user->isAdmin()) {
                JWTAuth::invalidate();

                setcookie('bl_token', null, time() + (86400 * 30), '/');

                return redirect('login');
            }
        
        } catch(\Exception $e) {

            setcookie('bl_token', null, time() + (86400 * 30), '/');
            
            return redirect('login');
        }
        
        return $next($request);
    }
}
