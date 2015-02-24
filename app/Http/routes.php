<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['middleware' => 'auth.basic', 'uses' => 'FileController@index']);
Route::post('/', ['middleware' => 'auth.basic', 'uses' => 'FileController@store']);
Route::get('/{file}', ['middleware' => 'auth.basic', 'uses' => 'FileController@show']);
Route::delete('/{file}', ['middleware' => 'auth.basic', 'uses' => 'FileController@destroy']);



// Default stuff
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
