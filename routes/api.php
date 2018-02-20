<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// AIO Api v1
Route::group(['prefix' => '/aio/v1'], function(){

    //Route::get('/test', [ 'as' => 'test', 'uses' => 'MainController@test']);

    Route::group(['namespace' => 'Api'], function () {
        
        //Login
        Route::post('/login', 'UserController@login');
        
        //Logout
        //Route::post('/logout', 'UserController@logout');
    });

    Route::group(['middleware' => 'auth:api'], function(){

        // Home
        //Route::get('/', [ 'as' => '', 'uses' => 'MainController@index']);

        Route::group(['namespace' => 'Api'], function () {
            Route::post('/user_details', 'UserController@get_currentUserDetails');
        
            //Logout
            Route::post('/logout', 'UserController@logout');
        
        });
        

    });

});
