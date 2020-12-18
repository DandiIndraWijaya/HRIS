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


Route::post('/proses_login', 'App\Http\Controllers\LoginController@login')->name('proses_login');
Route::get('/', function () {
		return view('welcome');
})->name('welcome');

Route::get('/login');

Route::post('/proses_register', 'App\Http\Controllers\RegisterController@register')->name('proses_register');


Route::group(['middleware' => ['admin', 'auth']], function (){
	
	Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');
	Route::post('/import_pemilih', 'App\Http\Controllers\AdminController@import_pemilih')->name('import_pemilih');
	Route::get('/dashboard/cari_pemilih', 'App\Http\Controllers\AdminController@cari_pemilih')->name('cari_pemilih');

	Route::group(['prefix' => 'admin'], function () {
		// Manajemen Pegawai
		Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai');
		Route::post('/input_pegawai', 'App\Http\Controllers\PegawaiController@input_pegawai')->name('admin_input_pegawai');
		Route::post('/update_pegawai', 'App\Http\Controllers\PegawaiController@update_pegawai')->name('admin_update_pegawai');
		Route::post('/hapus_pegawai', 'App\Http\Controllers\PegawaiController@hapus_pegawai')->name('admin_hapus_pegawai');
		// Akhir Manajemen Pegawai
	});
});


Auth::routes();


