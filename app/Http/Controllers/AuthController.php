<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $r
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login( Request $r )
    {
        if( $r->isMethod( 'post' ) ){

            if( $user = \Auth::attempt( [ 'email' => $r->username , 'password' => $r->pwd ] ) ){

                return redirect( 'admin/clients');
            }else{
                return redirect( 'login' )->with( 'message', 'Invalid username or password' )
                    ->with( 'alert' , 'danger' );
            }
        }

        return view( 'themes.limit.auth.login' );
    }
}

