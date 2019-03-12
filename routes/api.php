<?php

use Illuminate\Http\Request;

Route::middleware(['cors'])->namespace('API\V1')->prefix('v1')->group(function() {

    Route::prefix('auth')->group(function() {
        // anyone can access
        Route::post('register', 'ApiAuthController@register');
        Route::post('login', 'ApiAuthController@login');
        Route::post('email/check', 'ApiAuthController@checkEmail');
        Route::post('verify', 'ApiAuthController@verify');
        Route::post('verification/resend', 'ApiAuthController@resendVerificationCode');

        // must be authenticated user
        Route::middleware(['jwt'])->group(function(){
            Route::get('user', 'ApiAuthController@getAuthUser');
            Route::get('logout', 'ApiAuthController@logout');
        });
    });

    Route::prefix('password')->group(function () {
        // anyone can access
        Route::post( 'email', 'ApiPasswordResetsController@sendResetCodeEmail' );
        Route::post( 'reset', 'ApiPasswordResetsController@resetPassword' );
    });

    Route::prefix('user')->group(function () {
        // must be authenticated user
        Route::middleware(['cors', 'jwt'])->group(function () {
            Route::put( '', 'ApiUsersController@update' );
            Route::post( 'photo', 'ApiUsersController@uploadProfilePhoto');
            Route::delete( 'photo', 'ApiUsersController@deleteProfilePhoto');
            Route::post( 'resend/email', 'ApiUsersController@resendEmail');
        });
    });

    // must be authenticated user
    // get model resources paginate
    Route::middleware([ 'jwt'])->group(function () {
        Route::get('users', 'ApiUsersController@getUsersPaginate');
    });
});