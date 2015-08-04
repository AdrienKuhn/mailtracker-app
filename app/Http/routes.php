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

Route::controllers([
	'auth' => 'Auth\AuthController'
]);

Route::get('track/{id}/{uniqid}', 'EmailTrackingController@track', array('as' => 'track'));

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function()
{

	// Dashboard
	// Route::get('/', 'Admin\AdminDashboardController@showDashboard', array('as' => 'dashboard'));

	// Profile
	Route::get('/profile/edit', 'Admin\AdminUserController@edit', array('as' => 'edit_profile'));
	Route::put('/profile/edit', 'Admin\AdminUserController@update', array('as' => 'update_profile'));

	// Mails
	Route::resource('email', 'Admin\AdminEmailController');
	Route::get('email/{id}/{uniqid}', 'Admin\AdminEmailController@generate_signature', array('as' => 'Download Signature'));

	// Mail trackings
	Route::resource('tracking', 'Admin\AdminEmailTrackingController', array('only' => array('destroy')));
});
