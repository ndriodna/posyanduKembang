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
<<<<<<< HEAD

	Route::group(['middleware' => ['role:Admin']], function (){

=======
	Route::get('/user/show','UserController@showAuthUser')->name('user.showAuthUser');
	Route::group(['middleware' => ['role:Admin']], function (){
  
>>>>>>> ebf4c70f6124bc062e29684ccced59b9b6ca2e1b
	  Route::resource('residents', 'ResidentController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');
		
	});

});
