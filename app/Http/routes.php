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

Route::get('/', [
	'as' => 'frontpage',
	'uses' => 'SiteController@home'
]);

// User stuff
Route::get('user/login',array(
	'as' => 'userLogin',
	'uses' => 'Auth\UserAuthController@getlogin'
));
Route::post('user/login',array(
	'as' => 'userLoginPost',
	'uses' => 'Auth\UserAuthController@postLogin'
));
Route::get('user/logout',array(
	'as' => 'userLogout',
	'uses' => 'Auth\UserAuthController@getLogout'
));
Route::get('user/signup',array(
	'as' => 'userSignup',
	'uses' => 'Auth\UserAuthController@getRegister'
));
Route::post('user/signup',array(
	'as' => 'userSignupPost',
	'uses' => 'Auth\UserAuthController@postRegister'
));

Route::group(['middleware' => 'auth'], function(){

	Route::get('/dashboard', [
		'as' => 'dashboardIndex',
		'uses' => 'DashboardController@index'
	]);

});

