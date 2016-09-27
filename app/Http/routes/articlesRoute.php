<?php
	Route::resource('/articles', 'ArticlesController');
	Route::get('/articles/delete/{id}', 'ArticlesController@destroy');
