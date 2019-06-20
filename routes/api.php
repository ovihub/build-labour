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
                Route::post('/', 'ApiUserSkillsController@update'); // onboarding step 5
                Route::delete('', 'ApiUserSkillsController@deleteMainSkills');
            });

            Route::prefix('education')->group(function() {
                Route::post('/', 'ApiUserEducationsController@add'); // onboarding step 3
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

            Route::post('current-role', 'ApiWorksController@updateCurrentRole'); // onboarding worker step 1

            Route::post('sectors', 'ApiWorksController@updateSectors'); // onboarding worker step 2

            Route::post('affirmations', 'ApiWorksController@updateAffirmations'); // onboarding worker step 7

            Route::post('next-role', 'ApiWorkerController@updateNextRole'); // onboarding worker step 6
            Route::delete('next-role', 'ApiWorkerController@deleteNextRole');

            Route::post('about-me', 'ApiWorkerController@updateNextRole');
            Route::delete('about-me', 'ApiWorkerController@deleteAboutMe');

            Route::get('tickets', 'ApiUserTicketsController@tickets');
            Route::post('tickets', 'ApiUserTicketsController@updateTickets'); // onboarding step 4

            Route::post('personal-details', 'ApiWorkerController@updatePersonalDetails'); // onboarding step 8

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
        
        Route::get('options', 'ApiCompaniesController@options');
        Route::get('options/{id}', 'ApiCompaniesController@getMainFunctionItems');

        Route::middleware([ 'jwt' ])->group(function () {

            Route::get('search', 'ApiCompaniesController@search');
            Route::post('update', 'ApiCompaniesController@update');
            Route::post('photo', 'ApiCompaniesController@uploadPhoto');

            Route::get('{id}', 'ApiCompaniesController@view');
            Route::get('{id}/specialization', 'ApiCompaniesController@specialization');
            Route::get('{id}/workers', 'ApiCompaniesController@workers');
            Route::get('{id}/people', 'ApiCompaniesController@workers');

            Route::get('{id}/posts/jobs', 'ApiCompaniesController@jobPosts'); // company jobs with is_template is false - done
            Route::get('{id}/posts', 'ApiCompaniesController@posts');
            Route::get('{id}/jobs', 'ApiCompaniesController@jobs'); // jobs and company_jobs with is_template is true and false
            Route::get('{id}/jobs/{jid}', 'ApiCompaniesController@viewJob');

        });
    });

    Route::prefix('job')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::post('', 'ApiJobsController@create'); // post a job then flag is_template is set to false
            Route::post('save-template', 'ApiJobsController@saveTemplate'); // post a job then flag is_template is set to true
            Route::get('search', 'ApiJobsController@searchCompanyJobs'); // search a jobs and company jobs with is_template is false
            Route::post('search/filter', 'ApiJobsController@postFilter');

            Route::post('{id}', 'ApiJobsController@update');
            Route::get('{id}', 'ApiJobsController@view');

            Route::post('{id}/requirements', 'ApiJobsController@postJobRequirements');
            Route::post('{id}/responsibilities', 'ApiJobsController@postJobResponsibilities');
            Route::get('{id}/responsibilities', 'ApiJobsController@getJobResponsibilities');
        });
    });

    Route::prefix('bookmarks')->group(function () {
        Route::middleware([ 'jwt' ])->group(function () {

            Route::post('', 'ApiBookmarksController@postBookmark');
            Route::get('posts', 'ApiBookmarksController@getPosts');
            Route::get('posts/ids', 'ApiBookmarksController@getPostsById');
            Route::get('posts/jobs', 'ApiBookmarksController@getPostJobs');
            Route::get('posts/jobs/ids', 'ApiBookmarksController@getJobsById');
        });
    });

    Route::get('locations', 'ApiGeneralController@searchLocation');
    Route::get('countries', 'ApiGeneralController@getCountries');
    Route::get('courses', 'ApiGeneralController@getCourses');

    Route::get('roles', 'ApiRolesController@index');
    Route::get('roles/job/search', 'ApiRolesController@searchJobRoles');

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
                Route::get('roles', 'ApiJobsController@getRoles');
                Route::post('roles/', 'ApiJobsController@postRole');
                Route::get('roles/{id}', 'ApiJobsController@getRole');
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