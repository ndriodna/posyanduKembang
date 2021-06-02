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
  route::get('berita/','FrontController@showNews')->name('showNews');
  route::get('berita/{slug}/','FrontController@showNewsDetail')->name('showNewsDetail');
  route::get('berita/tag/{slug}/','FrontController@showByTag')->name('showByTag');
  Route::get('credits/', 'FrontController@credits')->name('credits');

Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'laravel-filemanager'], function () {
      \UniSharp\LaravelFilemanager\Lfm::routes();
  });
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/dashboard-user', 'HomeController@user');
	Route::get('/help', 'HomeController@helpPage')->name('help');
	Route::get('/user/show','UserController@showAuthUser')->name('user.showAuthUser');
  Route::resource('blog', 'BlogController');
  Route::resource('tags', 'TagController');

	Route::group(['middleware' => ['role:Admin']], function (){

    Route::resource('pendaftaran', 'PendaftaranController');
    Route::resource('pencatatan', 'PencatatanController');
    Route::get('/buat/pencatatan/{id}', 'PendaftaranController@addNote')->name('addNote');
    Route::get('/buat/pelayanan/{id}', 'PelayananController@addPelayanan')->name('addPelayanan');
    Route::get('/pelayanan/list', 'PelayananController@listPelayanan')->name('pelayanan.list');
    Route::resource('penyuluhan', 'PenyuluhanController');
    Route::resource('pelayanan', 'PelayananController');

		Route::resource('rekap', 'RekapController');
		Route::resource('user', 'UserController');
    Route::resource('roles', 'RoleController');

	});

});
