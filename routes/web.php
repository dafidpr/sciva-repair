<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

//HomePage
Route::get('/', function () {
    return view('homepage');
});

//login
Route::get('/login', function () {
    return view('auth.login');
})->middleware('notauthmiddle');
Route::post('/login/input', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::middleware(['authmiddle', 'user'])->group(function () {
    //User Admin
    Route::get('/admin/dashboard', function () {
        return view('dashboard.user');
    });
    Route::get('/admin/servis', function () {
        return view('content.servis');
    });
    Route::get('/admin/entry_penjualan', function () {
        return view('transaksi.entry_penjualan');
    });
    Route::get('/admin/daftar_penjualan', function () {
        return view('transaksi.data_penjualan');
    });
    Route::get('/admin/entry_pembelian', function () {
        return view('transaksi.entry_pembelian');
    });
    Route::get('/admin/daftar_pembelian', function () {
        return view('transaksi.data_pembelian');
    });
    Route::get('/admin/piutang', function () {
        return view('transaksi.piutang');
    });
    Route::get('/admin/hutang', function () {
        return view('transaksi.hutang');
    });

    //master data barang
    Route::get('/admin/barang', [ProductController::class, 'index']);
    Route::post('/admin/barang/tambahbarang', [ProductController::class, 'create']);
    Route::get('/admin/barang/hapusdata/{id}', [ProductController::class, 'destroy']);
    Route::get('/admin/barang/detail/{id}', [ProductController::class, 'show']);
    Route::post('/admin/barang/editdata', [ProductController::class, 'update']);


    Route::get('/admin/jasa', function () {
        return view('masterdata.data_jasa');
    });
    Route::get('/admin/supplier', function () {
        return view('masterdata.supplier');
    });
    Route::get('/admin/stokopname', function () {
        return view('masterdata.stokopname');
    });
    Route::get('/admin/stok_in_out', function () {
        return view('masterdata.stok_in_out');
    });
    Route::get('/admin/pelanggan', function () {
        return view('masterdata.pelanggan');
    });
    Route::get('/admin/karyawan', function () {
        return view('masterdata.karyawan');
    });
    Route::get('/admin/grafik', function () {
        return view('content.grafik');
    });
    Route::get('/admin/lap_labarugi', function () {
        return view('laporan.labarugi');
    });
    Route::get('/admin/lap_jurnalharian', function () {
        return view('laporan.jurnalharian');
    });
    Route::get('/admin/lap_penjualan', function () {
        return view('laporan.penjualan');
    });
    Route::get('/admin/lap_stokopname', function () {
        return view('laporan.stokopname');
    });
    Route::get('/admin/lap_stok_in_out', function () {
        return view('laporan.stok_in_out');
    });
    Route::get('/admin/lap_kas', function () {
        return view('laporan.kas');
    });
    Route::get('/admin/lap_kasbank', function () {
        return view('laporan.kasbank');
    });
    Route::get('/admin/lap_pembelian', function () {
        return view('laporan.pembelian');
    });
    Route::get('/admin/lap_hutangpiutang', function () {
        return view('laporan.hutangpiutang');
    });
    Route::get('/admin/backupdata', function () {
        return view('tools.backupdata');
    });
    Route::get('/admin/generatebarcode', function () {
        return view('tools.generatebarcode');
    });
    Route::get('/admin/del_dataservis', function () {
        return view('tools.del_dataservis');
    });
    Route::get('/admin/del_transaksi', function () {
        return view('tools.del_transaksi');
    });
    Route::get('/admin/kas', function () {
        return view('keuangan.kas');
    });
    Route::get('/admin/ppn', function () {
        return view('keuangan.ppn');
    });
    Route::get('/admin/bank', function () {
        return view('keuangan.bank');
    });
    Route::get('/admin/komisi', function () {
        return view('content.komisikaryawan');
    });
    Route::get('/admin/profil', function () {
        return view('setting.profil_toko');
    });
    Route::get('/admin/footer_nota', function () {
        return view('setting.footerNota');
    });
    Route::get('/admin/format_WA', function () {
        return view('setting.formatWA');
    });
    Route::get('/admin/format_sms', function () {
        return view('setting.formatsms');
    });
    Route::get('/admin/bataspengambilan', function () {
        return view('setting.bataspengambilan');
    });
    Route::get('/admin/ubahpassword', function () {
        return view('content.ubahpassword');
    });
});

Route::middleware(['authmiddle', 'customer'])->group(function () {
    //Pelanggan
    Route::get('/pelanggan/dashboardpelanggan', function () {
        return view('dashboard.pelanggan');
    });
    Route::get('/pelanggan/ubahpassword', function () {
        return view('content.ubahpasswordpelanggan');
    });
});
