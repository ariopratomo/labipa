<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->resource('/barang', 'BarangController');
Route::middleware('auth')->resource('/pemakaian-barang', 'PemakaianBarangController');
Route::middleware('auth')->resource('/jadwal', 'JadwalLabController');
Route::middleware('auth')->resource('/kelas', 'KelasController');


Route::get('/data/barang', 'DataController@barang')->name('data.barang');
Route::get('/data/pakai', 'DataController@pakai')->name('data.pakai');
Route::get('/data/kelas', 'DataController@kelas')->name('data.kelas');
