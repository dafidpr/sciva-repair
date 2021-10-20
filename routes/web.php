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
