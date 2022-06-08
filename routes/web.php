<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\ReceivableController;
use App\Http\Controllers\RepaireController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\TransactionServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatController;
use App\Models\Sale;
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
Route::get('/admin/servis/{id}/json_service3', [TransactionServiceController::class, 'json_service3']);



Route::prefix('admin')->middleware(['authmiddle', 'user'])->group(function () {


    // Route::get('/ajax/purchase', function () {
    //     return view('ajax.purchase');
    // });
    //User Admin
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('servis')->group(function () {
        Route::get('', [TransactionServiceController::class, 'index'])->middleware('can:read-services');
        Route::get('/restore', [TransactionServiceController::class, 'restore'])->middleware('can:restore-services');
        Route::get('/{id}/select_customer', [TransactionServiceController::class, 'select_customer']);
        Route::get('/{id}/edit_detail_spare', [TransactionServiceController::class, 'edit_detail_spare']);
        Route::get('/{id}/select_repaire', [TransactionServiceController::class, 'select_repaire']);
        Route::get('/{id}/detail_service', [TransactionServiceController::class, 'detail_service']);
        Route::get('/{id}/edit', [TransactionServiceController::class, 'edit'])->middleware('can:update-services');
        Route::post('/{id}/update', [TransactionServiceController::class, 'update']);
        Route::get('/{id}/json_service', [TransactionServiceController::class, 'json_service']);
        Route::get('/{id}/json_service2', [TransactionServiceController::class, 'json_service2']);
        Route::get('/{id}/delete', [TransactionServiceController::class, 'destroy']);
        Route::get('/deletepermanent/{id?}', [TransactionServiceController::class, 'deletePermanent']);
        Route::get('/restoreall/{id?}', [TransactionServiceController::class, 'restoreall']);
        Route::get('/batalServis/{id}/{st}', [TransactionServiceController::class, 'batalServis']);
        Route::post('/create', [TransactionServiceController::class, 'store'])->middleware("can:create-services");
        Route::post('/takeUnit', [TransactionServiceController::class, 'takeUnit'])->middleware('can:take-services');
        Route::get('/create_customer/{telephone}/{name}/{address}', [TransactionServiceController::class, 'create_customer']);
        Route::post('/serviceSelesai', [TransactionServiceController::class, 'serviceSelesai']);
        Route::post('/filter', [TransactionServiceController::class, 'filter']);
        Route::post('/{id}/tambah_data_sparepart_edit', [TransactionServiceController::class, 'tambah_data_sparepart_edit']);
        Route::post('/{id}/tambah_data_jasa_edit', [TransactionServiceController::class, 'tambah_data_jasa_edit']);
        Route::get('/{id}/del_data_jasa_edit', [TransactionServiceController::class, 'del_data_jasa_edit']);
        Route::get('/{id}/del_data_sparepart_edit', [TransactionServiceController::class, 'del_data_sparepart_edit']);
        Route::post('editSparepartserv', [TransactionServiceController::class, 'editSparepartserv']);

        Route::get('/print_take/{id}', [TransactionServiceController::class, 'print_take'])->middleware('can:printNota-services');
        Route::get('/print_take_epson/{id}', [TransactionServiceController::class, 'print_take_epson'])->middleware('can:printNota-services');
        Route::get('/service_masuk/{id}', [TransactionServiceController::class, 'service_masuk'])->middleware('can:printNota-services');
        Route::get('/service_masuk_epson/{id}', [TransactionServiceController::class, 'service_masuk_epson'])->middleware('can:printNota-services');
    });

    Route::prefix('entry_penjualan')->group(function () {
        Route::get('', [SaleController::class, 'Entry'])->middleware('can:create-sales');
        Route::post('/inputSale', [SaleController::class, 'store']);
    });
    Route::prefix('daftar_penjualan')->group(function () {
        Route::get('', [SaleController::class, 'index'])->middleware('can:read-sales');
        Route::get('/show/{id}', [SaleController::class, 'show'])->middleware('can:detail-sales');
        Route::get('/cetak/{id}', [SaleController::class, 'cetak'])->middleware('can:print-sales');
        Route::get('/cetak_epson/{id}', [SaleController::class, 'cetak_epson'])->middleware('can:print-sales');
    });

    Route::get('/entry_pembelian', [purchaseController::class, 'entry'])->middleware('can:create-purchases');
    Route::prefix('daftar_pembelian')->group(function () {
        Route::get('', [purchaseController::class, 'index'])->middleware('can:read-purchases');
        Route::get('/{id}/select_supplier', [purchaseController::class, 'select_supplier']);
        Route::post('/inputPurchase', [purchaseController::class, 'store']);
        Route::get('/createProd/{a}/{b}/{c}/{d}/{e}/{f}/{g}', [purchaseController::class, 'createProd']);
        Route::get('/{id}/detail_pembelian', [purchaseController::class, 'show'])->middleware('can:detail-purchases');
    });

    Route::prefix('piutang')->group(function () {
        Route::get('', [ReceivableController::class, 'index'])->middleware('can:read-receivable');
        Route::get('/{id}/pay_receivable', [ReceivableController::class, 'pay_receivable'])->middleware('can:payment-receivable');
        Route::get('/{id}/delete_receivable', [ReceivableController::class, 'delete_receivable']);
        Route::get('/{id}/detail_receivable', [ReceivableController::class, 'detail_receivable'])->middleware('can:detail-receivable');
        Route::post('/pembayaran_piutang', [ReceivableController::class, 'store']);
    });

    Route::prefix('hutang')->group(function () {
        Route::get('', [DebtController::class, 'index'])->middleware('can:read-debt');
        Route::get('/{id}/view_payment_debt', [DebtController::class, 'show'])->middleware('can:payment-debt');
        Route::get('/{id}/delete_detail', [DebtController::class, 'delete_detail']);
        Route::post('/payment_debt', [DebtController::class, 'payment_debt']);
        Route::get('/{id}/detail_debt', [DebtController::class, 'detail_debt'])->middleware('can:detail-debt');
    });

    //master data barang
    Route::prefix('barang')->group(function () {
        Route::get('', [ProductController::class, 'index'])->middleware("can:read-products");
        Route::post('/tambahbarang', [ProductController::class, 'create'])->middleware('can:create-products');
        Route::get('/hapusdata/{id}', [ProductController::class, 'destroy'])->middleware('can:delete-products');
        Route::get('/detail/{id}', [ProductController::class, 'show']);
        Route::post('/editdata', [ProductController::class, 'update'])->middleware('can:update-products');
        Route::post('/import_excel', [ProductController::class, 'import_excel'])->middleware('can:create-products');
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
        Route::get('/print_data_product', [ReportController::class, 'print_data_product']);
        Route::get('/{id}/select_product', [OpnameController::class, 'selectProduct']);
        Route::get('/{id}/delete', [OpnameController::class, 'destroy'])->middleware('can:delete-opnames');
        Route::get('/{id}/detail', [OpnameController::class, 'show'])->middleware('can:update-opnames');
    });

    Route::prefix('stock_in_out')->group(function () {
        Route::get('', [StockController::class, 'index'])->middleware('can:read-stocks');
        Route::get('/{id}/delete', [StockController::class, 'destroy'])->middleware('can:delete-stocks');
        Route::post('/create', [StockController::class, 'store'])->middleware('can:create-stocks');
    });
    Route::prefix('pelanggan')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->middleware('can:read-customers');
        Route::post('/create', [CustomerController::class, 'store'])->middleware('can:create-customers');
        Route::post('/update', [CustomerController::class, 'update'])->middleware('can:update-customers');
        Route::get('/{id}/delete', [CustomerController::class, 'destroy'])->middleware('can:delete-customers');
        Route::get('/detail/{id}', [CustomerController::class, 'show']);
        Route::get('/editPtoD/{id}', [CustomerController::class, 'editPtoD']);
    });

    //master karyawan/user
    Route::prefix('karyawan')->group(function () {
        Route::get('', [UserController::class, 'index'])->middleware('can:read-users');
        Route::post('/tambah', [UserController::class, 'store'])->middleware('can:create-users');
        Route::get('/hapusdata/{id}', [UserController::class, 'destroy'])->middleware('can:delete-users');
        Route::get('/detail/{id}', [UserController::class, 'show']);
        Route::get('/change_Passbyadmin/{id}', [UserController::class, 'change_Passbyadmin']);
        Route::post('/ubahPassByadmin/{id}', [UserController::class, 'ubahPassByadmin']);
        Route::post('/update', [UserController::class, 'update'])->middleware('can:update-users');
        //roles
        Route::post('/createRole', [RoleController::class, 'store'])->middleware('can:create-roles');
        Route::get('/deleteRole/{id}', [RoleController::class, 'destroy'])->middleware('can:delete-roles');
        Route::post('/updateRole', [RoleController::class, 'update'])->middleware('can:update-roles');
        Route::get('/detailRole/{id}', [RoleController::class, 'show']);
        Route::get('/changepermission/{id}', [RoleController::class, 'changePermission']);
        Route::post('/{id}/input-change-permissions', [RoleController::class, 'inputPermission']);
    });

    Route::prefix('grafik')->group(function () {
        Route::get('', [GrafikController::class, 'index'])->middleware('can:read-grafik');
    });


    Route::prefix('lap_labarugi')->group(function () {
        Route::post('/cetak_labakotor', [ReportController::class, 'laba_rugi']);
        Route::post('/cetak_lababersih', [ReportController::class, 'laba_bersih']);
        Route::get('', function () {
            return view('laporan.labarugi');
        })->middleware('can:profit-report');
    });
    Route::prefix('lap_jurnalharian')->group(function () {
        Route::post('print', [ReportController::class, 'jurnal_harian']);
        Route::get('', function () {
            return view('laporan.jurnalharian');
        })->middleware('can:daily-report');
    });
    Route::prefix('lap_penjualan')->group(function () {
        Route::get('', function () {
            return view('laporan.penjualan');
        })->middleware('can:sales-report');
        Route::post('cetak_sale', [ReportController::class, 'sale']);
    });
    Route::prefix('lap_stokopname')->group(function () {
        Route::post('/print_opname', [ReportController::class, 'opname']);
        Route::get('', function () {
            return view('laporan.stokopname');
        })->middleware('can:opnames-report');
    });
    Route::prefix('lap_stok_in_out')->group(function () {
        Route::post('/print_report', [ReportController::class, 'in_out']);
        Route::get('', function () {
            return view('laporan.stok_in_out');
        })->middleware('can:stockInOut-report');
    });
    Route::prefix('lap_kas')->group(function () {
        Route::post('/print_cash', [ReportController::class, 'cash']);
        Route::get('', function () {
            return view('laporan.kas');
        })->middleware('can:cash-report');
    });
    Route::get('/lap_kasbank', function () {
        return view('laporan.kasbank');
    });
    Route::prefix('lap_pembelian')->group(function () {
        Route::get('', function () {
            return view('laporan.pembelian');
        })->middleware('can:purchases-report');
        Route::post('/cetak_purchase', [ReportController::class, 'purchase']);
    });
    Route::prefix('lap_hutangpiutang')->group(function () {
        Route::post('/print_debt', [ReportController::class, 'debt']);
        Route::post('/print_receivable', [ReportController::class, 'receivable']);
        Route::get('', [ReportController::class, 'hutang_piutang'])->middleware('can:debtsAndReceivables-report');
    });

    Route::get('/backupdata', function () {
        return view('tools.backupdata');
    })->middleware('can:backup-tools');
    Route::get('/backupdata/mydatabase', [ToolsController::class, 'backupDatabase']);
    Route::post('/backupdata/restore_db', [ToolsController::class, 'restore_db']);

    Route::prefix('restore')->group(function () {
        //restore Penjualan
        Route::get('/getRestoreSale', [RestoreController::class, 'indexSale']);
        Route::get('/forceDeleteSale/{id?}', [RestoreController::class, 'forceDeleteSale']);
        Route::get('/forceRestoreSale/{id?}', [RestoreController::class, 'forceRestoreSale']);
        //restore Pembelian
        Route::get('/getRestorePurchase', [RestoreController::class, 'indexPurchase']);
        Route::get('/forceDeletePurchase/{id?}', [RestoreController::class, 'forceDeletePurchase']);
        Route::get('/forceRestorePurchase/{id?}', [RestoreController::class, 'forceRestorePurchase']);
        //restore Hutang
        Route::get('/getRestoreDebt', [RestoreController::class, 'indexDebt']);
        Route::get('/forceDeleteDebt/{id?}', [RestoreController::class, 'forceDeleteDebt']);
        Route::get('/forceRestoreDebt/{id?}', [RestoreController::class, 'forceRestoreDebt']);
        //piutang
        Route::get('/getRestoreReceivable', [RestoreController::class, 'indexReceivable']);
        Route::get('/forceDeleteReceivable/{id?}', [RestoreController::class, 'forceDeleteReceivable']);
        Route::get('/forceRestoreReceivable/{id?}', [RestoreController::class, 'forceRestoreReceivable']);
    });

    Route::get('/generatebarcode', [ToolsController::class, 'index'])->middleware('can:generateBarcode-tools');
    Route::post('/generatebarcode/update', [ToolsController::class, 'updateBarcode']);
    Route::post('/generatebarcode/cetak', [ToolsController::class, 'cetak']);
    Route::get('/generatebarcode/generate/{id}', [ToolsController::class, 'generate']);

    Route::get('/del_dataservis', function () {
        return view('tools.del_dataservis');
    })->middleware('can:deleteServis-tools');
    Route::post('/del_servis', [ToolsController::class, 'deleteServisRange']);


    Route::prefix('del_transaksi')->group(function () {
        Route::get('', function () {
            return view('tools.del_transaksi');
        })->middleware('can:deleteTransaction-tools');
        Route::post('/deleteSale', [ToolsController::class, 'deleteSale']);
        Route::post('/deletePurchase', [ToolsController::class, 'deletePurchase']);
        Route::post('/deleteDebt', [ToolsController::class, 'deleteDebt']);
        Route::post('/deleteReceivable', [ToolsController::class, 'deleteReceivable']);
    });

    Route::prefix('kas')->group(function () {
        Route::get('', [CashController::class, 'index'])->middleware('can:read-cash');
        Route::get('/{id}/delete_cash', [CashController::class, 'destroy'])->middleware('can:delete-cash');
        Route::post('/create_cash', [CashController::class, 'store'])->middleware('can:create-cash');
    });

    Route::prefix('ppn')->group(function () {
        Route::get('', [VatController::class, 'index'])->middleware('can:read-ppn');
        Route::get('/{id}/delete_vat', [VatController::class, 'destroy'])->middleware('can:delete-ppn');
        Route::post('/create_vat_tax', [VatController::class, 'store'])->middleware('can:create-ppn');
    });
    Route::get('/bank', function () {
        return view('keuangan.bank');
    });

    Route::prefix('komisi')->group(function () {
        Route::post('/cetak_komisi', [KomisiController::class, 'store']);
        Route::get('', [KomisiController::class, 'index'])->middleware('can:commission-users');
    });
    Route::get('/profil', [CompanyController::class, 'index'])->middleware('can:profile-settings');
    Route::post('/profil/changeProfil', [CompanyController::class, 'store']);

    Route::prefix('footer_nota')->group(function () {
        Route::get('', [SettingController::class, 'indexfooter'])->middleware('can:footerNota-settings');
        //Sale
        Route::post('/updateNotaSale', [SettingController::class, 'updateNotaSale']);
        Route::post('/updateNotaSaleEp', [SettingController::class, 'updateNotaSaleEp']);
        //Servis Masuk
        Route::post('/updateNotaServis', [SettingController::class, 'updateNotaServis']);
        Route::post('/updateNotaServisEp', [SettingController::class, 'updateNotaServisEp']);
        //servis diambil
        Route::post('/updateNotaServisTake', [SettingController::class, 'updateNotaServisTake']);
        Route::post('/updateNotaServisTakeEp', [SettingController::class, 'updateNotaServisTakeEp']);
    });
    Route::prefix('format_WA')->group(function () {
        Route::get('', [SettingController::class, 'indexWA'])->middleware('can:formatWA-settings');
        Route::get('/format_wa_get', [SettingController::class, 'format_wa']);
        Route::post('/updateFormatWA', [SettingController::class, 'updateFormatWA']);
    });
    Route::prefix('format_sms')->group(function () {
        Route::get('', [SettingController::class, 'indexSms'])->middleware('can:formatSMS-settings');
        Route::post('/updateFormatSms', [SettingController::class, 'updateFormatSms']);
    });
    Route::prefix('bataspengambilan')->group(function () {
        Route::get('', [SettingController::class, 'indexBatas'])->middleware('can:daylimit-settings');
        Route::post('/updateBatas', [SettingController::class, 'updateBatas']);
    });
    Route::prefix('ubahpassword')->group(function () {
        Route::get('', function () {
            return view('content.ubahpassword');
        });
        Route::post('/ubah', [GrafikController::class, 'update']);
    });
});

Route::prefix('pelanggan')->middleware(['authmiddle', 'customer'])->group(function () {
    //Pelanggan
    Route::get('/dashboardpelanggan', [DashboardController::class, 'indexCs']);
    Route::get('/ubahpassword', function () {
        return view('content.ubahpasswordpelanggan');
    });
    Route::post('/ubahpassword/ubah', [DashboardController::class, 'updatePassCs']);
    Route::get('/{id}/detail_service', [TransactionServiceController::class, 'detail_service']);
});
