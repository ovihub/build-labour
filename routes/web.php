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
            Route::get('profile', 'UsersController@showProfile');
            Route::get('verify', 'UsersController@showVerifyForm');
        });
    });