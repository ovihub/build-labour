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

Route::get('/', 'PageController@index');
Route::get('home', 'PageController@index');

Route::get('login', 'AuthController@showLoginForm')->name('login')->middleware('checktoken');
Route::get('register', 'AuthController@showRegisterForm')->name('register')->middleware('checktoken');

Route::prefix('password')
    ->group(function() {
        Route::get('request', 'PasswordResetsController@showRequestForm')->name('password_request')->middleware('checktoken');
        Route::get('reset', 'PasswordResetsController@showResetForm')->name('password_reset')->middleware('checktoken');
    });

Route::prefix('user')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function(){
            Route::get('profile', 'UsersController@showProfile')->name('profile');
        });
        Route::get('verify', 'UsersController@showVerifyForm')->name('verify');
    });

Route::prefix('company')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function(){
            Route::get('profile', 'CompaniesController@showCompany');
        });
    });

Route::prefix('job')
    ->group(function() {
        Route::middleware(['checktoken'])->group(function(){
            Route::get('view', 'JobsController@showJob');
        });
    });
    
Route::namespace('Admin')
    ->middleware(['checktoken', 'admin'])
    ->prefix('all')
    ->group(function() {
        Route::get('users', 'DatatableController@showUsers')->name('users');
        Route::get('jobs', 'DatatableController@showJobs')->name('jobs');
        Route::get('tickets', 'DatatableController@showTickets')->name('tickets');

        Route::prefix('datatable')
            ->group(function () {
                Route::get('users', 'DatatableController@getUsersDatatable')->name('users.table');
                Route::get('jobs', 'DatatableController@getJobsDatatable')->name('jobs.table');
                Route::get('tickets', 'DatatableController@getTicketsDatatable')->name('tickets.table');
            });
    });

Route::namespace('Admin')->group(function() {

    Route::prefix('admin')->group(function() {

        Route::get('',  'AuthController@showAdmin')->middleware(['admin'])->name('admin.index');
        Route::get('login', 'AuthController@showLoginForm')->middleware(['admin'])->name('admin.login');
    });
});