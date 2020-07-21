<?php

use App\User;
use Illuminate\Http\Request;
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
Route::middleware('auth', 'role:admin')->resource('/pemusnahan-barang', 'PemusnahanBarangController');
Route::middleware('auth', 'role:admin')->resource('/jadwal', 'JadwalLabController');
Route::middleware('auth', 'role:admin')->resource('/kelas', 'KelasController');
Route::middleware('auth', 'role:admin')->resource('/users', 'UserController');
Route::middleware('auth')->get('/profile', 'ProfileController@index')->name('profile');
Route::middleware('auth')->put('/profile/update/{id}', 'ProfileController@update')->name('profile.update');


Route::get('/data/barang', 'DataController@barang')->name('data.barang');
Route::get('/data/pakai', 'DataController@pakai')->name('data.pakai');
Route::get('/data/kelas', 'DataController@kelas')->name('data.kelas');
Route::get('/data/jadwal', 'DataController@jadwal')->name('data.jadwal');
Route::get('/data/user', 'DataController@user')->name('data.user');
Route::get('/data/musnah', 'DataController@musnah')->name('data.musnah');



Route::middleware('auth', 'role:admin')->get('/report/cetak_barang', 'ReportController@cetakBarang')->name('report.cetak_barang');
Route::middleware('auth', 'role:admin')->get('/report/cetak_pakaibarang', 'ReportController@cetakPemakaianBarang')->name('report.cetak_pakaibarang');
Route::middleware('auth', 'role:admin')->get('/report/cetak_musnahbarang', 'ReportController@cetakPemusnahanBarang')->name('report.cetak_musnahbarang');


Route::middleware('auth', 'role:admin')->get('/laporan', 'LaporanController@index')->name('laporan');
Route::middleware('auth', 'role:admin')->get('/laporan/datepakai', 'LaporanController@datepakai')->name('laporan.datepakai');
Route::middleware('auth', 'role:admin')->get('/laporan/datemusnah', 'LaporanController@datemusnah')->name('laporan.datemusnah');

Route::middleware('auth', 'role:admin')->get('/laporan/cetak_barang', 'LaporanController@cetakBarang')->name('laporan.cetak_barang');

Route::middleware('auth', 'role:admin')->post('/laporan/cetak_laporanpakai', 'LaporanController@cetakPakai')->name('laporan.cetak_laporanpakai');
Route::middleware('auth', 'role:admin')->get('/laporan/cetak_laporanpakai', 'LaporanController@cetakPakai')->name('laporan.cetak_laporanpakai');

Route::middleware('auth', 'role:admin')->post('/laporan/cetak_laporanmusnah', 'LaporanController@cetakMusnah')->name('laporan.cetak_laporanmusnah');
Route::middleware('auth', 'role:admin')->get('/laporan/cetak_laporanmusnah', 'LaporanController@cetakMusnah')->name('laporan.cetak_laporanmusnah');
