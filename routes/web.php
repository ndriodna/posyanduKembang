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
    return redirect('/home');
});

Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'laravel-filemanager'], function () {
      \UniSharp\LaravelFilemanager\Lfm::routes();
  });
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/residents/kk/{id}', 'ResidentController@kk')->name('kk');
  Route::get('residents/pilih_kk/{slug}', 'ResidentController@selectkk')->name('selectkk');
	Route::get('residents/buat_kk/{id}', 'ResidentController@buatkk')->name('buatkk');
	Route::get('/dashboard-user', 'HomeController@user');
	Route::get('/user/show','UserController@showAuthUser')->name('user.showAuthUser');
  Route::resource('brands', 'BrandController');

	Route::group(['middleware' => ['role:Admin']], function (){

    Route::resource('residents', 'ResidentController');
    Route::resource('families', 'FamilieController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');

	});

});
