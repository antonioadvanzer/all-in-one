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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Login
Route::get('/login', [ 'as' => 'login', 'uses' => 'MainController@auth'])->middleware('guest');

// Start session
Route::post('/start_session', [ 'as' => 'start_session', 'uses' => 'MainController@start_session']);

// Auth
Route::group(['middleware' => 'auth.aio'], function(){

    // Home
    Route::get('/', [ 'as' => '', 'uses' => 'MainController@index']);

    // Logout
    Route::post('/logout', [ 'as' => 'close_session', 'uses' => 'MainController@close_session']);

});
