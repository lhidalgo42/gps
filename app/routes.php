<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Routes for Login
|--------------------------------------------------------------------------
|
*/
Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

Route::post('/gps/data/create','GPSController@create');


Route::group(array('before' => 'auth'), function() {
	Route::get('/', ['as' => 'home', 'uses' => 'UsersController@home']);
	Route::get('/device/{id}', 'DevicesController@show');
    Route::get('/config',['as' => 'config','uses' => 'UsersController@config']);
    Route::get('/profile',['as' => 'profile','uses' => 'UsersController@profile']);




     Route::get('/gps/data/index','GPSController@index');
     Route::post('/gps/data/send/test','GPSController@sendTest');
     Route::post('/gps/data/send/stole','GPSController@sendStole');
     Route::post('/gps/data/send/getitback','GPSController@sendGetitback');
});
