<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [ 'as' => 'index', 'uses' => 'WebsiteController@index']);


//guest routes
Route::group(['middleware' => 'guest'], function () {
	// Authentication routes...
	Route::get('auth/login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
	Route::post('auth/login', [ 'as' => 'post.login', 'uses' => 'LoginController@login']);

});

//auth routes
Route::group(['middleware' => 'auth'], function () {
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'LoginController@logout']);
});


/*****************************SUPER ADMIN***********************************/

Route::group(['middleware' => 'admin'], function () {

	Route::get('admin', [ 'as' => 'admin', 'uses' => 'AdminController@index']);

	Route::get('admin/profile', [ 'as' => 'admin.profile', 'uses' => 'AdminController@profile']);
	Route::put('admin/{admin}', [ 'as' => 'admin.update', 'uses' => 'AdminController@update']);
	Route::put('admin/password/{admin}', [ 'as' => 'admin.update.password', 'uses' => 'AdminController@update_password']);


//Providers
	Route::get('admin/users/provider', [ 'as' => 'admin.provider', 'uses' => 'AdminController@users_provider']);
	Route::get('admin/users/provider/create', [ 'as' => 'admin.provider.create', 'uses' => 'AdminController@users_provider_create']);
	Route::post('admin/provider/create', [ 'as' => 'admin.provider.post', 'uses' => 'AdminController@create_provider_user']);
	Route::get('admin/users/provider/show/{id}', [ 'as' => 'admin.provider.show', 'uses' => 'AdminController@show_provider']);
	Route::get('admin/users/provider/edit/{id}', [ 'as' => 'admin.provider.edit', 'uses' => 'AdminController@edit_provider']);
	Route::put('admin/users/provider/update/{id}', [ 'as' => 'admin.provider.update', 'uses' => 'AdminController@update_provider']);

//Workers
	Route::get('admin/users/worker', [ 'as' => 'admin.worker', 'uses' => 'AdminController@users_worker']);
	Route::get('admin/users/worker/create', [ 'as' => 'admin.worker.create', 'uses' => 'AdminController@users_worker_create']);
	Route::post('admin/worker/create', [ 'as' => 'admin.worker.post', 'uses' => 'AdminController@create_worker_user']);
	Route::get('admin/users/worker/show/{id}', [ 'as' => 'admin.worker.show', 'uses' => 'AdminController@show_worker']);
	Route::get('admin/users/worker/edit/{id}', [ 'as' => 'admin.worker.edit', 'uses' => 'AdminController@edit_worker']);
	Route::put('admin/users/worker/update/{id}', [ 'as' => 'admin.worker.update', 'uses' => 'AdminController@update_worker']);



//Clients
	Route::get('admin/users/client', [ 'as' => 'admin.client', 'uses' => 'AdminController@users_client']);
	Route::get('admin/users/client/create', [ 'as' => 'admin.client.create', 'uses' => 'AdminController@users_client_create']);
	Route::post('admin/client/create', [ 'as' => 'admin.client.post', 'uses' => 'AdminController@create_client_user']);
	Route::get('admin/users/client/show/{id}', [ 'as' => 'admin.client.show', 'uses' => 'AdminController@show_client']);
	Route::get('admin/users/client/edit/{id}', [ 'as' => 'admin.client.edit', 'uses' => 'AdminController@edit_client']);
	Route::put('admin/users/client/update/{id}', [ 'as' => 'admin.client.update', 'uses' => 'AdminController@update_client']);

});
