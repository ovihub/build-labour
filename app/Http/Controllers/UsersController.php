<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Token;
use JWTAuth;

class UsersController extends Controller
{
    public function showProfile()
    {
        $token = isset($_COOKIE['bl_token']) ? $_COOKIE['bl_token'] : null;

        if ( !$token ) {
            $user = JWTAuth::parseToken()->authenticate();

        } else {
            $rawToken = substr($token, 1, -1);
            $token = new Token($rawToken);
            $payload = JWTAuth::decode($token);

            $user = Auth::loginUsingId($payload['sub']);
        }

        if ($user->role_id == 1) {
            return redirect('/user/profile');
        
        } else if ($user->role_id == 2) {
            return redirect('/company/profile');
        }
    }

    public function showVerifyForm(Request $r)
    {

        if (isset($r->tk)) {

            $user = User::whereVerificationCode($r->tk)->first();

            if ($user) {

                $user->verification_code = NULL;
                $user->is_verified = Carbon::now();
                $user->save();
                return redirect(route('login'));
            }

        }

        return view('errors.500');
    }
}

