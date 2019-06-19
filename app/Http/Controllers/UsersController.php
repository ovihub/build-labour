<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Token;
use JWTAuth;
use App\Models\Companies\Company;

class UsersController extends Controller
{
    public function showProfile($id = null)
    {
        $page = \Route::current()->getName();

        $token = isset($_COOKIE['bl_token']) ? $_COOKIE['bl_token'] : null;

        if ( !$token ) {
            $user = JWTAuth::parseToken()->authenticate();

        } else {
            $rawToken = substr($token, 1, -1);
            $token = new Token($rawToken);
            $payload = JWTAuth::decode($token);

            $user = Auth::loginUsingId($payload['sub']);
        }

        if ($id == null) {
            if ($user->role_id == 1) {
                return view('users.profile')->with('user_id', null);
            
            } else if ($user->role_id == 2) {
                return view('companies.profile')->with('company_id',
                            (Company::where('created_by', $user->id)->first())->id);
            }
        }

        if ($page == 'company_profile') {
            $company = Company::where('created_by', $user->id)->first();

            if ($user->role_id == 2 && $company && $company->id == $id) {
                return redirect('/user/profile');
            }

            return view('companies.profile')->with('company_id', $id);
        }

        if ($page == 'profile') {
            $profile = User::find($id)->first();

            if ($user->role_id == 1 && $profile && $profile->id == $id) {
                return redirect('/user/profile');
            }

            return view('users.profile')->with('user_id', $id);
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

