<?php
	Route::resource('/comments', 'CommentsController');
	Route::post('/comments/update/{id}', 'CommentsController@update');