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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->resource('/barang', 'BarangController');
Route::resource('/pinjam-barang', 'PinjamBarangController');


Route::get('/data/barang', 'DataController@barang')->name('data.barang');
Route::get('/data/pinjam', 'DataController@pinjam')->name('data.pinjam');
