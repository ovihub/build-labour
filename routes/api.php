<?php

use Illuminate\Http\Request;

Route::middleware(['cors'])->namespace('API\V1')->prefix('v1')->group(function() {

    Route::prefix('auth')->group(function() {
        // anyone can access
        Route::post('register', 'ApiAuthController@register');
        Route::post('company/register', 'ApiAuthController@registerCompany');
        Route::post('login', 'ApiAuthController@login');
        Route::post('email/check', 'ApiAuthController@checkEmail');
        Route::post('verify', 'ApiAuthController@verify');
        Route::post('verification/resend', 'ApiAuthController@resendVerificationCode');

        // must be authenticated user
        Route::middleware(['jwt'])->group(function(){
            Route::get('user', 'ApiAuthController@getAuthUser');
            Route::get('logout', 'ApiAuthController@logout');
            Route::get('company', 'ApiAuthController@company');
        });
    });

    Route::prefix('password')->group(function () {
        // anyone can access
        Route::post('email', 'ApiPasswordResetsController@sendResetCodeEmail');
        Route::post('reset', 'ApiPasswordResetsController@resetPassword');
    });

    Route::prefix('user')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::put( '', 'ApiUsersController@update');
            Route::post( '', 'ApiUsersController@update');
            Route::post('photo', 'ApiUsersController@uploadProfilePhoto');
            Route::delete('photo', 'ApiUsersController@deleteProfilePhoto');

            Route::prefix('skills')->group(function() {
                Route::post('/', 'ApiUserSkillsController@update');
                Route::delete('', 'ApiUserSkillsController@deleteMainSkills');
            });

            Route::prefix('education')->group(function() {
                Route::post('/', 'ApiUserEducationsController@add');
                Route::put('/{id}', 'ApiUserEducationsController@update');
                Route::post('/{id}', 'ApiUserEducationsController@update');
                Route::delete('/{id}', 'ApiUserEducationsController@delete');
            });

            Route::prefix('ticket')->group(function() {
                Route::post('/', 'ApiUserTicketsController@add');
                Route::put('/{id}', 'ApiUserTicketsController@update');
                Route::post('/{id}', 'ApiUserTicketsController@update');
                Route::delete('/{id}', 'ApiUserTicketsController@delete');
            });
        });
    });

    Route::prefix('worker')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::post('next-role', 'ApiWorkerController@updateNextRole');
            Route::delete('next-role', 'ApiWorkerController@deleteNextRole');

            Route::post('about-me', 'ApiWorkerController@updateNextRole');
            Route::delete('about-me', 'ApiWorkerController@deleteAboutMe');

            Route::get('tickets', 'ApiUserTicketsController@tickets');
            Route::post('tickets', 'ApiUserTicketsController@updateTickets');

            Route::post('optional', 'ApiWorkerController@updateOptional');
            Route::post('introduction', 'ApiWorkerController@updateIntroduction');
            Route::get('experiences', 'ApiWorkerController@experiences');
            Route::get('educations', 'ApiWorkerController@educations');
            Route::get('skill-options', 'ApiWorkerController@skillOptions');
        });
    });

    Route::prefix('work')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {
            Route::post('experience', 'ApiWorksController@add');
            Route::put('experience/{id}', 'ApiWorksController@update');
            Route::post('experience/{id}', 'ApiWorksController@update');
            Route::delete('experience/{id}', 'ApiWorksController@delete');
        });
    });

    Route::prefix('company')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::get('search', 'ApiCompaniesController@search');
            Route::get('options', 'ApiCompaniesController@options');
            Route::post('update', 'ApiCompaniesController@update');
            Route::post('photo', 'ApiCompaniesController@uploadPhoto');
            Route::get('{id}', 'ApiCompaniesController@view');
            Route::get('{id}/specialization', 'ApiCompaniesController@specialization');
            Route::get('{id}/workers', 'ApiCompaniesController@workers');

            Route::get('{id}/posts/jobs', 'ApiCompaniesController@jobPosts');
            Route::get('{id}/posts', 'ApiCompaniesController@posts');
            Route::get('{id}/jobs', 'ApiCompaniesController@jobs');
            Route::get('{id}/jobs/{jid}', 'ApiCompaniesController@viewJob');

        });
    });

    Route::prefix('job')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::post('', 'ApiJobsController@create');
            Route::post('search', 'ApiJobsController@search');
            Route::post('{id}', 'ApiJobsController@update');
            Route::get('{id}', 'ApiJobsController@view');

            Route::post('{id}/requirements', 'ApiJobsController@postJobRequirements');
            Route::post('{id}/responsibilities', 'ApiJobsController@postJobResponsibilities');
        });
    });

    Route::get('locations', 'ApiUsersController@searchLocation');

    Route::get('roles', 'ApiRolesController@index');

    Route::prefix('tickets')->group(function() {

        Route::middleware([ 'jwt' ])->group(function () {

            Route::get('search', 'ApiTicketsController@search');
        });
    });

    Route::prefix('device')->middleware([ 'jwt' ])->group(function () {
        Route::post( 'register', 'ApiDevicesController@registerDevice' );
        Route::post( 'unregister', 'ApiDevicesController@unregisterDevice' );
    });

    Route::prefix('notification')->middleware([ 'jwt' ])->group(function () {
        Route::post( 'test', 'ApiPushNotificationsController@test');
    });

    // chat
    Route::prefix('chat')->middleware([ 'jwt' , 'chat' ])->group(function () {
        Route::post( 'send', 'ApiChatController@send' );
        Route::get( 'channels', 'ApiChatController@channels' );
        Route::get( 'history', 'ApiChatController@historyByChannel' );
        Route::get( 'unread', 'ApiChatController@unread' );
        Route::post( 'reset_unread', 'ApiChatController@resetUnread' );
    });


    Route::prefix( 'connections' )->middleware([ 'jwt' , 'chat' ])->group(function () {
        Route::post( 'connect', 'ApiConnectionsController@connect' );
        Route::post( 'status/change', 'ApiConnectionsController@changeStatus' );
        Route::get( 'active', 'ApiConnectionsController@activeConnections' );
        Route::get( 'pending', 'ApiConnectionsController@pendingConnections' );
    });

});

// Admin
Route::namespace('API\V1\Admin')
    ->middleware(['jwt', 'admin'])
    ->prefix('v1/admin')
    ->group(function() {
        Route::prefix('user')
            ->group(function () {
                Route::get('get', 'ApiUsersController@get');
                Route::post('upload', 'ApiUsersController@upload');
                Route::delete('photo/delete', 'ApiUsersController@deletePhoto');
                Route::delete('delete', 'ApiUsersController@delete');
            });

        Route::prefix('ticket')
            ->group(function () {
                Route::get('get', 'ApiTicketsController@get');
            });

        Route::prefix('job')
            ->group(function () {
                Route::get('get', 'ApiJobsController@get');
            });

        Route::prefix('company')
            ->group(function () {
                Route::get('get', 'ApiCompaniesController@get');
            });
    });

Route::namespace('API\V1\Admin')
    ->prefix('v1/admin')
    ->group(function() {
        Route::prefix('auth')
            ->group(function () {
                Route::post('login', 'ApiAuthController@login');
            });
    });