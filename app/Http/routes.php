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

Route::get('/', 'WelcomeController@index');
Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('profile', ['uses' => 'UsersController@profile', 'as' => 'profile']);
Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@contact');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
