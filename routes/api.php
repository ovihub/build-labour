<?php

use Illuminate\Http\Request;


//Route::group([ 'middleware' => ['cors'], 'prefix' => '/v1' , 'namespace' => 'API\V1' ], function () {
Route::group([ 'prefix' => '/v1' , 'namespace' => 'API\V1' ], function () {
    Route::group([ 'prefix' => 'auth'  ], function () {
        Route::post( 'register', 'ApiAuthController@register' );
        Route::post( 'login', 'ApiAuthController@login' );
        Route::post( 'email/check', 'ApiAuthController@checkEmail' );
    });

});

