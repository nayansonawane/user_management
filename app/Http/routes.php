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
	return view('admin.login');
});

Route::get('/login', function () {
	return view('admin.login');
});

Route::post('/process_login', ['as'=>'Process Login','uses'=>'Admin\AuthController@process_login']);
Route::get('/logout', ['as'=>'Logout','uses'=>'Admin\AuthController@logout']);

Route::group(['middleware'=>'auth'], function () 
{
	Route::get('/dashboard', function () {
		return view('admin.dashboard');
	});

	Route::group(['prefix'=>'/user' ,'middleware' => 'admin_auth'], function () 
	{
		$controller_in_use = 'Admin\UserController@';
		Route::get('/', ['as'=>'Manage Users','uses'=>$controller_in_use.'index']);
		Route::get('/create', ['as'=>'Create User','uses'=>$controller_in_use.'create']);
		Route::post('/store', ['as'=>'Store User','uses'=>$controller_in_use.'store']);
		Route::get('/edit/{id}', ['as'=>'Edit User','uses'=>$controller_in_use.'edit']);
		Route::post('/update', ['as'=>'Store User','uses'=>$controller_in_use.'update']);
	});
});
