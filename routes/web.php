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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::resource('residents', ResidentController::class);
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard-user', 'HomeController@user');
	Route::resource('user', 'UserController');
	Route::resource('roles', 'RoleController');
  Route::resource('residents', ResidentController::class);
});
