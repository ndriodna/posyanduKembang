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
// Route::get('/', function () {
//     return redirect('/home');
// });
  Route::get('/', 'FrontController@index');

Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'laravel-filemanager'], function () {
      \UniSharp\LaravelFilemanager\Lfm::routes();
  });
  Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard-user', 'HomeController@user');
	Route::get('/user/show','UserController@showAuthUser')->name('user.showAuthUser');
  Route::resource('blog', 'BlogController');

	Route::group(['middleware' => ['role:Admin']], function (){

    Route::resource('pendaftaran', 'PendaftaranController');
    Route::resource('pencatatan', 'PencatatanController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');

	});

});
