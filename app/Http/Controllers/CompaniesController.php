<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Companies\Company;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Token;
use JWTAuth;

class CompaniesController extends Controller
{
    public function showCompany($id = null)
    {
        if ($id == null) {
            $token = isset($_COOKIE['bl_token']) ? $_COOKIE['bl_token'] : null;

            if ( !$token ) {
                $user = JWTAuth::parseToken()->authenticate();

            } else {
                $rawToken = substr($token, 1, -1);
                $token = new Token($rawToken);
                $payload = JWTAuth::decode($token);

                $user = Auth::loginUsingId($payload['sub']);
            }

            return view('companies.profile')->with('company_id',
                        (Company::where('created_by', $user->id)->first())->id);
        }
        
        return view('companies.profile')->with('company_id', $id);
    }
}

