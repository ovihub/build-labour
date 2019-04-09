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
        Route::post('email', 'ApiPasswordResetsController@sendResetCodeEmail');
        Route::post('reset', 'ApiPasswordResetsController@resetPassword');
    });

    Route::prefix('user')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {
            Route::put( '', 'ApiUsersController@update' );
            Route::post('photo', 'ApiUsersController@uploadProfilePhoto');
            Route::delete('photo', 'ApiUsersController@deleteProfilePhoto');

            Route::prefix('skill')->group(function() {
                Route::post('/', 'ApiUserSkillsController@add');
                Route::put('/{id}', 'ApiUserSkillsController@update');
                Route::delete('/{id}', 'ApiUserSkillsController@delete');
            });

            Route::prefix('education')->group(function() {
                Route::post('/', 'ApiUserEducationsController@add');
                Route::put('/{id}', 'ApiUserEducationsController@update');
                Route::delete('/{id}', 'ApiUserEducationsController@delete');
            });

            Route::prefix('ticket')->group(function() {
                Route::post('/', 'ApiUserTicketsController@add');
                Route::put('/{id}', 'ApiUserTicketsController@update');
                Route::delete('/{id}', 'ApiUserTicketsController@delete');
            });
        });
    });

    Route::prefix('work')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {
            Route::post('experience', 'ApiWorksController@add');
            Route::put('experience/{id}', 'ApiWorksController@update');
            Route::delete('experience/{id}', 'ApiWorksController@delete');
        });
    });

    Route::prefix('company')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {
            Route::put('', 'ApiCompaniesController@update');
        });
    });

    Route::get('roles', 'ApiRolesController@index');


//    Route::prefix('device')->middleware([ 'jwt' ])->group(function () {
//        Route::post( 'register', 'ApiDevicesController@registerDevice' );
//        Route::post( 'unregister', 'ApiDevicesController@unregisterDevice' );
//    });
//
//    Route::prefix('notification')->middleware([ 'jwt' ])->group(function () {
//        Route::post( 'test', 'ApiPushNotificationsController@test');
//    });
//
//    // chat
//    Route::prefix('chat')->middleware([ 'jwt' , 'chat' ])->group(function () {
//        Route::post( 'send', 'ApiChatController@send' );
//        Route::get( 'channels', 'ApiChatController@channels' );
//        Route::get( 'history', 'ApiChatController@historyByChannel' );
//        Route::get( 'unread', 'ApiChatController@unread' );
//        Route::post( 'reset_unread', 'ApiChatController@resetUnread' );
//    });

});