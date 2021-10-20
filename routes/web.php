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
    return view('homepage');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard.user');
});
Route::get('/servis', function () {
    return view('content.servis');
});
Route::get('/entry_penjualan', function () {
    return view('transaksi.entry_penjualan');
});
Route::get('/daftar_penjualan', function () {
    return view('transaksi.data_penjualan');
});
Route::get('/entry_pembelian', function () {
    return view('transaksi.entry_pembelian');
});
Route::get('/daftar_pembelian', function () {
    return view('transaksi.data_pembelian');
});
Route::get('/piutang', function () {
    return view('transaksi.piutang');
});
Route::get('/hutang', function () {
    return view('transaksi.hutang');
});
Route::get('/barang', function () {
    return view('masterdata.barang');
});
Route::get('/jasa', function () {
    return view('masterdata.data_jasa');
});
Route::get('/pelanggan', function () {
    return view('masterdata.pelanggan');
});
Route::get('/karyawan', function () {
    return view('masterdata.karyawan');
});
