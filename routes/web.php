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
    Route::get('/buat/pencatatan/{id}', 'PendaftaranController@addNote')->name('addNote');
    Route::get('/buat/pelayanan/{id}', 'PelayananController@addPelayanan')->name('addPelayanan');
    Route::get('/pelayanan/list', 'PelayananController@listPelayanan')->name('pelayanan.list');
    Route::resource('penyuluhan', 'PenyuluhanController');
    Route::resource('pelayanan', 'PelayananController');
    Route::get('pelayanan/detail/{id}', 'PelayananController@pendaftaranDetail')->name('getDetail');

		Route::resource('rekap', 'RekapController');
		Route::resource('user', 'UserController');
    Route::resource('roles', 'RoleController');
		Route::resource('tags', 'TagController');

	});

});
