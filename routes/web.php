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
Route::get('/supplier', function () {
    return view('masterdata.supplier');
});
Route::get('/stokopname', function () {
    return view('masterdata.stokopname');
});
Route::get('/stok_in_out', function () {
    return view('masterdata.stok_in_out');
});
Route::get('/pelanggan', function () {
    return view('masterdata.pelanggan');
});
Route::get('/karyawan', function () {
    return view('masterdata.karyawan');
});
Route::get('/grafik', function () {
    return view('content.grafik');
});
Route::get('/lap_labarugi', function () {
    return view('laporan.labarugi');
});
Route::get('/lap_jurnalharian', function () {
    return view('laporan.jurnalharian');
});
Route::get('/lap_penjualan', function () {
    return view('laporan.penjualan');
});
Route::get('/lap_stokopname', function () {
    return view('laporan.stokopname');
});
Route::get('/lap_stok_in_out', function () {
    return view('laporan.stok_in_out');
});
Route::get('/lap_kas', function () {
    return view('laporan.kas');
});
Route::get('/lap_kasbank', function () {
    return view('laporan.kasbank');
});
Route::get('/lap_pembelian', function () {
    return view('laporan.pembelian');
});
Route::get('/lap_hutangpiutang', function () {
    return view('laporan.hutangpiutang');
});
Route::get('/backupdata', function () {
    return view('tools.backupdata');
});
Route::get('/generatebarcode', function () {
    return view('tools.generatebarcode');
});
Route::get('/del_dataservis', function () {
    return view('tools.del_dataservis');
});
Route::get('/del_transaksi', function () {
    return view('tools.del_transaksi');
});
Route::get('/kas', function () {
    return view('keuangan.kas');
});
Route::get('/ppn', function () {
    return view('keuangan.ppn');
});
Route::get('/bank', function () {
    return view('keuangan.bank');
});
Route::get('/komisi', function () {
    return view('content.komisikaryawan');
});
Route::get('/profil', function () {
    return view('setting.profil_toko');
});
