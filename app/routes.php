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

 Route::get('/', function()
{
	return View::make('hello');
});
Route::resource('admin', 'AdminController');
Route::any('users/login','UserController@login');
Route::any('users/new','UserController@registerNewUser');
Route::any('users/logout','UserController@logOutUser');
Route::resource('newuser', 'MultiUseController');
Route::resource('contacts', 'ContactsController');
Route::resource('post_staffs', 'PostStaffsController');
Route::controller('password', 'RemindersController');
