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
//vista
Route::get('/', function () {
    return view('wilcommen');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//});

Route::post('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::post('sendCv', 'LoginController@sendCv');

Route::post('savePosition', 'DashboardController@savePosition');

Route::get('dashboard', 'DashboardController@index');


Route::get('error', function(){ 
    abort(500);
});
