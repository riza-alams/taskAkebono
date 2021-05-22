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
Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('/login-karyawan', 'Auth\LoginController@karyawan')->name('karyawan.login');

Route::group(['middleware' => 'auth:web,karyawan'],function() {
    Route::get('/home','HomeController@index')->name('home');
    Route::resource('transaksi','TransaksiController');
    Route::resource('karyawan','KaryawanController');
    Route::resource('item','ItemController');
    Route::resource('lokasi','LokasiController');
    Route::resource('achivement','AchivementController');
    Route::resource('planing','PlanningController');

});