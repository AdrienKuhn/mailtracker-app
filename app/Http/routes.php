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

	// Mails
	Route::resource('email', 'Admin\AdminEmailController', array('except' => array('destroy')));

});
