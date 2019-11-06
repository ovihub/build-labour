<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index')->middleware(['forcehttps']);
Route::get('home', 'PageController@index');
Route::get('reset-email', 'PageController@resetEmail');

Route::middleware(['checktoken'])->group(function() {
    Route::get('login', 'AuthController@showLoginForm')->name('login');
    Route::get('register', 'AuthController@showRegisterForm')->name('register');
    Route::get('company/register', 'AuthController@showCompanyRegisterForm')->name('register_company');

    Route::prefix('password')
        ->group(function() {
            Route::get('request', 'PasswordResetsController@showRequestForm')->name('password_request');
            Route::get('reset', 'PasswordResetsController@showResetForm')->name('password_reset');
        });
});

Route::prefix('user')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function() {
            Route::get('profile', 'UsersController@showProfile')->name('profile');
            Route::get('profile/{id}', 'UsersController@showProfile')->name('profile')->middleware('company_has_viewed_profile');
            Route::get('onboarding', 'UsersController@showOnboarding')->name('onboarding');
        });
        Route::get('verify', 'UsersController@showVerifyForm')->name('verify');
    });

Route::prefix('company')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function() {
            Route::get('profile/{id}', 'UsersController@showProfile')->name('company_profile');
        });
    });

Route::prefix('job')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function() {
            Route::get('list', 'JobsController@list')->name('list_job');
            Route::get('view', 'JobsController@view')->name('view_job');
            Route::get('applicants', 'JobsController@viewApplicants')->name('applicants');
            Route::get('post', 'JobsController@post')->name('post_job');
            Route::get('search', 'JobsController@search');
            Route::get('search/all', 'JobsController@searchAll');
        });
    });
    
Route::namespace('Admin')
    ->middleware(['checktoken', 'admin'])
    ->prefix('all')
    ->group(function() {
        Route::get('users', 'DatatableController@showUsers')->name('users');
        Route::get('workers', 'DatatableController@showWorkers')->name('workers');
        Route::get('jobs', 'DatatableController@showJobs')->name('jobs');
        Route::get('job-roles', 'DatatableController@showJobRoles')->name('jobRoles');
        Route::get('tickets', 'DatatableController@showTickets')->name('tickets');
        Route::get('companies', 'DatatableController@showCompanies')->name('companies');

        Route::prefix('datatable')
            ->group(function () {
                Route::get('users', 'DatatableController@getUsersDatatable')->name('users.table');
                Route::get('workers', 'DatatableController@getWorkersDatatable')->name('workers.table');
                Route::get('jobs', 'DatatableController@getJobsDatatable')->name('jobs.table');
                Route::get('job-roles', 'DatatableController@getJobRolesDatatable')->name('job-roles.table');
                Route::get('tickets', 'DatatableController@getTicketsDatatable')->name('tickets.table');
                Route::get('companies', 'DatatableController@getCompaniesDatatable')->name('companies.table');
            });
    });

Route::namespace('Admin')->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('',  'AuthController@showAdmin')->middleware(['admin'])->name('admin.index');
        Route::get('login', 'AuthController@showLoginForm')->middleware(['admin'])->name('admin.login');
    });
});