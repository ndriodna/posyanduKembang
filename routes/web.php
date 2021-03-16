<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard-user', 'HomeController@user');
	Route::get('/user/show','UserController@showAuthUser')->name('user.showAuthUser');

	Route::group(['middleware' => ['role:Admin']], function (){
<<<<<<< HEAD

    Route::resource('residents', 'ResidentController');
	  Route::resource('families', 'FamilieController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');

=======
	  Route::resource('residents', 'ResidentController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');
>>>>>>> c687cbed311dd2941abf45468fb6af58a217b09c
	});

});
