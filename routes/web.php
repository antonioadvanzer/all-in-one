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

    Route::group(['prefix' => 'user'], function () {
    
        // Form
        Route::get('/nuevo_usuario', [ 'as' => 'nuevo_usuario', 'uses' => 'UserController@get_newUserForm']);

        // Table
        Route::get('/lista_usuarios', [ 'as' => 'lista_usuarios', 'uses' => 'UserController@get_listUserTable']);

    });

    Route::group(['prefix' => 'rol'], function () {
        
        // Form
        Route::get('/nuevo_rol', [ 'as' => 'nuevo_rol', 'uses' => 'RolController@get_newRolForm']);

        // Table
        Route::get('/lista_roles', [ 'as' => 'lista_roles', 'uses' => 'RolController@get_listRolTable']);

        // Save
        Route::post('/guardar_nuevo_rol', ['as' => 'guardar_nuevo_rol', 'uses' => 'RolController@store_newRol']);

    });

    Route::group(['prefix' => 'repository'], function () {

        // Form
        Route::get('/nuevo_repositorio', [ 'as' => 'nuevo_repositorio', 'uses' => 'RepositoryController@get_newRepositoryForm']);

        // Table
        Route::get('/lista_repositorios', [ 'as' => 'lista_repositorios', 'uses' => 'RepositoryController@get_listRepositoryTable']);

        // Save
        Route::post('/guardar_nuevo_repositorio', ['as' => 'guardar_nuevo_repositorio', 'uses' => 'RepositoryController@store_newRepository']);
    });

});
