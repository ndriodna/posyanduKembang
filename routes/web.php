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
<<<<<<< HEAD
=======
Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
Route::resource('residents', ResidentController::class);
=======
>>>>>>> 95e7315c74f5ecaf5333f424ca6161cd629cc6ae

>>>>>>> 7189296922e4aa54c96d564263af159e3b69fd06
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard-user', 'HomeController@user');
	Route::resource('user', 'UserController');
  Route::resource('residents', ResidentController::class);
});