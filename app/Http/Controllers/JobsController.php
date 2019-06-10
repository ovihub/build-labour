<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Token;
use JWTAuth;

class JobsController extends Controller
{
    public function view()
    {
        $page = \Route::current()->getName();

        $token = isset($_COOKIE['bl_token']) ? $_COOKIE['bl_token'] : null;

        if (! $token) {
            $user = JWTAuth::parseToken()->authenticate();

        } else {
            $rawToken = substr($token, 1, -1);
            $token = new Token($rawToken);
            $payload = JWTAuth::decode($token);

            $user = Auth::loginUsingId($payload['sub']);
        }

        if ($page == 'view_job' && $_GET || ($page == 'post_job' && $user->role_id == 2 && ! $_GET)) {
            return view('jobs.view');
        
        } else {
            return view('errors.404');
        }
    }

    public function search()
    {
        return view('jobs.search');
    }
}

