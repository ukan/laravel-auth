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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sessions/create', function(){
	return view('sessions.create');
});

Route::get('/login','UsersController@login');

Route::resource('/users', 'UsersController');

Route::resource('/sessions', 'SessionsController', array('except' => array('index', 'destroy')));

Route::get('/logout','SessionsController@logout');


/*Route::get('/index', 'ArticlesController@index');
Route::get('/articles/index','ArticlesController@index');
Route::get('/articles/create','ArticlesController@create');
Route::resource('/articles/store','ArticlesController@store');
Route::get('/articles/show/{id}','ArticlesController@show');
Route::get('/articles/edit/{id}','ArticlesController@edit');
Route::get('/articles/update/{id}','ArticlesController@update');
Route::get('/articles/delete/{id}','ArticlesController@destroy');*/
// Route::get('/sessions','SessionsController@store');