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
	//Authentication Route
	Route::get('auth/login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@getLogout']);
//Registration Route
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

//Password reset routes
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');
//category route
	Route::resource('categories', 'CategoryController', ['except'=>['create']]);
	
	Route::get('blog/{slug}',['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
//Comment Routes
	Route::post('comments/{id}', ['as'=>'comments.store', 'uses'=>'CommentController@store']);
	Route::get('comments/{id}/edit', ['as'=>'comments.edit', 'uses'=>'CommentController@edit']);
	Route::get('comments/{id}/delete', ['as'=>'comments.delete', 'uses'=>'CommentController@delete']);
	Route::put('comments/{id}', ['as'=>'comments.update', 'uses'=>'CommentController@update']);
	Route::delete('comments/{id}', ['as'=>'comments.destroy', 'uses'=>'CommentController@destroy']);
	//Tag route
	Route::resource('tags', 'TagController', ['except'=>['create']]);
	//Page controllers
	Route::get('contact', 'PageController@getContact');
	Route::post('contact', 'PageController@postContact');
	Route::get('about', 'PageController@getAbout');
	Route::get('/', 'PageController@getIndex');

	Route::resource('posts','PostController');


//Used in previous versions of laravel, however, all route is now in middleware by default
Route::group(['middleware'=>['web']], function(){
	
});