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


	//Sexdates
		Route::get('admin/users/sexdate', [ 'as' => 'admin.sexdate', 'uses' => 'AdminController@sexdate']);
		Route::post('admin/sexdate/create', [ 'as' => 'admin.sexdate.post', 'uses' => 'AdminController@create_sexdate']);
		Route::get('admin/users/sexdate/show/{id}', [ 'as' => 'admin.sexdate.show', 'uses' => 'AdminController@show_sexdate']);
		Route::get('admin/users/sexdate/createwithclient/{id}', [ 'as' => 'admin.sexdate.createwithclient', 'uses' => 'AdminController@createwithclient']);
		Route::get('admin/sexdate/delete/{id}', [ 'as' => 'admin.sexdate.delete', 'uses' => 'AdminController@delete_sexdate']);

		//stock
		Route::get('admin/stock', [ 'as' => 'admin.stock', 'uses' => 'AdminController@stock']);
		Route::get('admin/stock/create', [ 'as' => 'admin.stock.create', 'uses' => 'AdminController@stock_create']);
		Route::post('admin/stock/create', [ 'as' => 'admin.stock.post', 'uses' => 'AdminController@create_stock']);
		Route::get('admin/stock/edit/{id}', [ 'as' => 'admin.stock.edit', 'uses' => 'AdminController@edit_stock']);
		Route::put('admin/stock/update/{id}', [ 'as' => 'admin.stock.update', 'uses' => 'AdminController@update_stock']);
		Route::get('admin/stock/delete/{id}', [ 'as' => 'admin.stock.delete', 'uses' => 'AdminController@delete_stock']);

		//Tags
		Route::get('admin/tag', [ 'as' => 'admin.tag', 'uses' => 'AdminController@tag']);
		Route::get('admin/tag/create', [ 'as' => 'admin.tag.create', 'uses' => 'AdminController@tag_create']);
		Route::post('admin/tag/create', [ 'as' => 'admin.tag.post', 'uses' => 'AdminController@create_tag']);
		Route::get('admin/tag/edit/{id}', [ 'as' => 'admin.tag.edit', 'uses' => 'AdminController@edit_tag']);
		Route::put('admin/tag/update/{id}', [ 'as' => 'admin.tag.update', 'uses' => 'AdminController@update_tag']);
		Route::get('admin/tag/delete/{id}', [ 'as' => 'admin.tag.delete', 'uses' => 'AdminController@delete_tag']);
});


/*****************************PROVIDERS***********************************/

Route::group(['middleware' => 'provider'], function () {

	Route::get('provider', [ 'as' => 'provider', 'uses' => 'AdminController@index']);

	Route::get('provider/profile', [ 'as' => 'provider.profile', 'uses' => 'AdminController@profile']);
	Route::put('provider/{admin}', [ 'as' => 'provider.update', 'uses' => 'AdminController@update']);
	Route::put('provider/password/{admin}', [ 'as' => 'provider.update.password', 'uses' => 'AdminController@update_password']);


	//Providers
		Route::get('provider/users/provider', [ 'as' => 'provider.provider', 'uses' => 'AdminController@users_provider']);
		Route::get('provider/users/provider/show/{id}', [ 'as' => 'provider.provider.show', 'uses' => 'AdminController@show_provider']);


	//Workers
		Route::get('provider/users/worker', [ 'as' => 'provider.worker', 'uses' => 'AdminController@users_worker']);
		Route::get('provider/users/worker/create', [ 'as' => 'provider.worker.create', 'uses' => 'AdminController@users_worker_create']);
		Route::post('provider/worker/create', [ 'as' => 'provider.worker.post', 'uses' => 'AdminController@create_worker_user']);
		Route::get('provider/users/worker/show/{id}', [ 'as' => 'provider.worker.show', 'uses' => 'AdminController@show_worker']);
		Route::get('provider/users/worker/edit/{id}', [ 'as' => 'provider.worker.edit', 'uses' => 'AdminController@edit_worker']);
		Route::put('provider/users/worker/update/{id}', [ 'as' => 'provider.worker.update', 'uses' => 'AdminController@update_worker']);



	//Clients
		Route::get('provider/users/client/show/{id}', [ 'as' => 'provider.client.show', 'uses' => 'AdminController@show_client']);



		//Sexdates
			Route::get('provider/users/sexdate', [ 'as' => 'provider.sexdate', 'uses' => 'AdminController@sexdate']);
			Route::get('provider/users/sexdate/show/{id}', [ 'as' => 'provider.sexdate.show', 'uses' => 'AdminController@show_sexdate']);
			Route::get('provider/sexdate/delete/{id}', [ 'as' => 'provider.sexdate.delete', 'uses' => 'AdminController@delete_sexdate']);


});

/*****************************WORKERS***********************************/

Route::group(['middleware' => 'worker'], function () {

	Route::get('worker', [ 'as' => 'worker', 'uses' => 'AdminController@index']);

	Route::get('worker/profile', [ 'as' => 'worker.profile', 'uses' => 'AdminController@profile']);
	Route::put('worker/{admin}', [ 'as' => 'worker.update', 'uses' => 'AdminController@update']);
	Route::put('worker/password/{admin}', [ 'as' => 'worker.update.password', 'uses' => 'AdminController@update_password']);


	//Providers
		Route::get('worker/users/provider', [ 'as' => 'worker.provider', 'uses' => 'AdminController@users_provider']);
		Route::get('worker/users/provider/show/{id}', [ 'as' => 'worker.provider.show', 'uses' => 'AdminController@show_provider']);


	//Workers
		Route::get('worker/users/worker', [ 'as' => 'worker.worker', 'uses' => 'AdminController@users_worker']);
		Route::get('worker/users/worker/show/{id}', [ 'as' => 'worker.worker.show', 'uses' => 'AdminController@show_worker']);


	//Clients
		Route::get('worker/users/client/show/{id}', [ 'as' => 'worker.client.show', 'uses' => 'AdminController@show_client']);


		//Sexdates
			Route::get('worker/users/sexdate', [ 'as' => 'worker.sexdate', 'uses' => 'AdminController@sexdate']);
			Route::get('worker/users/sexdate/show/{id}', [ 'as' => 'worker.sexdate.show', 'uses' => 'AdminController@show_sexdate']);
			Route::get('worker/sexdate/delete/{id}', [ 'as' => 'worker.sexdate.delete', 'uses' => 'AdminController@delete_sexdate']);


});

/*****************************CLIENTS***********************************/

Route::group(['middleware' => 'client'], function () {

	Route::get('client', [ 'as' => 'client', 'uses' => 'AdminController@index']);

	Route::get('client/profile', [ 'as' => 'client.profile', 'uses' => 'AdminController@profile']);
	Route::put('client/{admin}', [ 'as' => 'client.update', 'uses' => 'AdminController@update']);
	Route::put('client/password/{admin}', [ 'as' => 'client.update.password', 'uses' => 'AdminController@update_password']);



	//Workers
		Route::get('client/users/worker', [ 'as' => 'client.worker', 'uses' => 'AdminController@users_worker']);
		Route::get('client/users/worker/show/{id}', [ 'as' => 'client.worker.show', 'uses' => 'AdminController@show_worker']);


		//Sexdates
			Route::get('client/users/sexdate', [ 'as' => 'client.sexdate', 'uses' => 'AdminController@sexdate']);
			Route::post('client/sexdate/create', [ 'as' => 'client.sexdate.post', 'uses' => 'AdminController@create_sexdate']);
			Route::get('client/users/sexdate/show/{id}', [ 'as' => 'client.sexdate.show', 'uses' => 'AdminController@show_sexdate']);
			Route::get('client/users/sexdate/createwithclient/{id}', [ 'as' => 'client.sexdate.createwithclient', 'uses' => 'AdminController@createwithclient']);
			Route::get('client/sexdate/delete/{id}', [ 'as' => 'client.sexdate.delete', 'uses' => 'AdminController@delete_sexdate']);

});
