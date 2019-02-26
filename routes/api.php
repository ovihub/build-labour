<?php

use Illuminate\Http\Request;

Route::namespace('API\V1')->prefix('v1')->group(function() {

    Route::prefix('auth')->group(function() {
        // anyone can accessph
        Route::post('register', 'ApiAuthController@register');
        Route::post('login', 'ApiAuthController@login');
        Route::post('email/check', 'ApiAuthController@checkEmail');
        
        // must be authenticated user
        Route::middleware(['cors', 'jwt'])->group(function () {
            Route::get('user', 'ApiAuthController@getAuthUser');
            Route::get('logout', 'ApiAuthController@logout');
        });
    });

    Route::prefix('password')->group(function () {
        // anyone can access
        Route::post('email', 'ApiPasswordResetsController@sendResetLinkEmail');
        Route::post('reset', 'ApiPasswordResetsController@resetPassword');
    });

    Route::prefix('user')->group(function () {
        // must be authenticated user
        Route::middleware(['cors', 'jwt'])->group(function () {
            Route::put('update', 'ApiUsersController@update');
            Route::post('upload', 'ApiUsersController@uploadProfilePhoto');
            Route::post('verify', 'ApiUsersController@verifyEmail');
            Route::post('resend/email', 'ApiUsersController@resendEmail');
        });
    });

    // must be authenticated user
    // get model resources paginate
    Route::middleware(['cors', 'jwt'])->group(function () {
        Route::get('users', 'ApiUsersController@getUsersPaginate');
    });
});