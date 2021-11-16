<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepaireController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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



Route::prefix('admin')->middleware(['authmiddle', 'user'])->group(function () {
    //User Admin
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

    //master data barang
    Route::prefix('barang')->group(function () {
        Route::get('', [ProductController::class, 'index'])->middleware("can:read-products");
        Route::post('/tambahbarang', [ProductController::class, 'create'])->middleware('can:create-products');
        Route::get('/hapusdata/{id}', [ProductController::class, 'destroy'])->middleware('can:delete-products');
        Route::get('/detail/{id}', [ProductController::class, 'show']);
        Route::post('/editdata', [ProductController::class, 'update'])->middleware('can:update-products');
    });


    Route::prefix('jasa')->group(function () {
        Route::get('', [RepaireController::class, 'index'])->middleware('can:read-repaire');
        Route::get('/{id}/delete', [RepaireController::class, 'destroy'])->middleware('can:delete-repaire');
        Route::get('/detail/{id}', [RepaireController::class, 'show']);
        Route::post('/create', [RepaireController::class, 'store'])->middleware('can:create-repaire');
        Route::post('/update', [RepaireController::class, 'update'])->middleware('can:update-repaire');
    });

    Route::prefix('supplier')->group(function () {
        Route::get('', [SupplierController::class, 'index']);
        Route::get('/{id}/delete', [SupplierController::class, 'destroy']);
        Route::get('/detail/{id}', [SupplierController::class, 'show']);
        Route::post('/create', [SupplierController::class, 'store']);
        Route::post('/update', [SupplierController::class, 'update']);
    });

    Route::prefix('stockopname')->group(function () {
        Route::get('', [OpnameController::class, 'index'])->middleware('can:read-opnames');
        Route::post('/create', [OpnameController::class, 'store'])->middleware('can:create-opnames');
        Route::post('/update/{id}', [OpnameController::class, 'update']);
        Route::get('/{id}/select_product', [OpnameController::class, 'selectProduct']);
        Route::get('/{id}/delete', [OpnameController::class, 'destroy'])->middleware('can:delete-opnames');
        Route::get('/{id}/detail', [OpnameController::class, 'show'])->middleware('can:update-opnames');
    });

    Route::get('/stok_in_out', function () {
        return view('masterdata.stok_in_out');
    });
    Route::prefix('pelanggan')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->middleware('can:read-customers');
        Route::post('/create', [CustomerController::class, 'store'])->middleware('can:create-customers');
        Route::post('/update', [CustomerController::class, 'update'])->middleware('can:update-customers');
        Route::get('/{id}/delete', [CustomerController::class, 'destroy'])->middleware('can:delete-customers');
        Route::get('/detail/{id}', [CustomerController::class, 'show']);
    });

    //master karyawan/user
    Route::prefix('karyawan')->group(function () {
        Route::get('', [UserController::class, 'index'])->middleware('can:read-users');
        Route::post('/tambah', [UserController::class, 'store'])->middleware('can:create-users');
        Route::get('/hapusdata/{id}', [UserController::class, 'destroy'])->middleware('can:delete-users');
        Route::get('/detail/{id}', [UserController::class, 'show']);
        Route::post('/update', [UserController::class, 'update'])->middleware('can:update-users');
        //roles
        Route::post('/createRole', [RoleController::class, 'store'])->middleware('can:create-roles');
        Route::get('/deleteRole/{id}', [RoleController::class, 'destroy'])->middleware('can:delete-roles');
        Route::post('/updateRole', [RoleController::class, 'update'])->middleware('can:update-roles');
        Route::get('/detailRole/{id}', [RoleController::class, 'show']);
        Route::get('/changepermission/{id}', [RoleController::class, 'changePermission']);
        Route::post('/{id}/input-change-permissions', [RoleController::class, 'inputPermission']);
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
    Route::get('/footer_nota', function () {
        return view('setting.footerNota');
    });
    Route::get('/format_WA', function () {
        return view('setting.formatWA');
    });
    Route::get('/format_sms', function () {
        return view('setting.formatsms');
    });
    Route::get('/bataspengambilan', function () {
        return view('setting.bataspengambilan');
    });
    Route::get('/ubahpassword', function () {
        return view('content.ubahpassword');
    });
});

Route::prefix('pelanggan')->middleware(['authmiddle', 'customer'])->group(function () {
    //Pelanggan
    Route::get('/dashboardpelanggan', function () {
        return view('dashboard.pelanggan');
    });
    Route::get('/ubahpassword', function () {
        return view('content.ubahpasswordpelanggan');
    });
});
