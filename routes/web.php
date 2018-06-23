<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('registration-verification/{activation_code}', array('as' => 'registration_conformation.index', 'uses' => 'RegistrationConfirmationController@index'));
Route::group(array('middleware' => 'auth'), function(){

	Route::get('users_list','UserController@index')->name('user.index');

	Route::get('user_profile','UserController@profile')->name('user.profile');
	
	Route::get('user_profile/edit','UserController@edit')->name('user.edit');
	Route::patch('user_profile/edit', 'UserController@update');

	});