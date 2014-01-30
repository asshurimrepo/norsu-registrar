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


Route::controller('/auth','AuthController');
Route::controller('/test','TestController');
Route::controller('/app', 'AppController');


Route::group(['before'=>'auth'], function(){

	Route::controller('manage', 'ManageController');
	Route::controller('task', 'TaskController');

	Route::group(['before'=>'has_fd_access'], function(){
		Route::resource('frontdesks', 'FrontdesksController');
	});

	Route::group(['before'=>'check_if_admin'], function(){
		Route::resource('users', 'UsersController');
		Route::resource('reasons', 'ReasonsController');
		Route::resource('requirements', 'RequirementsController');
		Route::resource('documents', 'DocumentsController');
		Route::controller('/','AdminController');
	});

});





