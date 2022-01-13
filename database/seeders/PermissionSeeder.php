<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::insert([
            ['name' => 'read-services', 'label' => 'View Servis', 'guard_name' => 'web'],
            ['name' => 'create-services', 'label' => 'Tambah Servis', 'guard_name' => 'web'],
            ['name' => 'update-services', 'label' => 'Ubah Servis', 'guard_name' => 'web'],
            ['name' => 'delete-services', 'label' => 'Hapus Servis', 'guard_name' => 'web'],
            ['name' => 'detail-services', 'label' => 'Detail Servis', 'guard_name' => 'web'],
            ['name' => 'restore-services', 'label' => 'Restore data Servis', 'guard_name' => 'web'],
            ['name' => 'printNota-services', 'label' => 'Print Nota Servis', 'guard_name' => 'web'],
            ['name' => 'take-services', 'label' => 'Pengambilan Servis', 'guard_name' => 'web'],
            ['name' => 'call-services', 'label' => 'Telephone Pelanggan Servis', 'guard_name' => 'web'],
            //
            ['name' => 'read-products', 'label' => 'View Barang', 'guard_name' => 'web'],
            ['name' => 'create-products', 'label' => 'Tambah Barang', 'guard_name' => 'web'],
            ['name' => 'update-products', 'label' => 'Ubah Barang', 'guard_name' => 'web'],
            ['name' => 'delete-products', 'label' => 'Hapus Barang', 'guard_name' => 'web'],
            //
            ['name' => 'read-users', 'label' => 'View Karyawan', 'guard_name' => 'web'],
            ['name' => 'create-users', 'label' => 'Tambah Karyawan', 'guard_name' => 'web'],
            ['name' => 'update-users', 'label' => 'Update Karyawan', 'guard_name' => 'web'],
            ['name' => 'delete-users', 'label' => 'Hapus Karyawan', 'guard_name' => 'web'],
            //
            ['name' => 'read-roles', 'label' => 'View Role', 'guard_name' => 'web'],
            ['name' => 'create-roles', 'label' => 'Tambah Role', 'guard_name' => 'web'],
            ['name' => 'update-roles', 'label' => 'Ubah Role', 'guard_name' => 'web'],
            ['name' => 'delete-roles', 'label' => 'Hapus Role', 'guard_name' => 'web'],
            ['name' => 'changePermissions-roles', 'label' => 'Ubah Permission', 'guard_name' => 'web'],
            //
            ['name' => 'read-repaire', 'label' => 'View Jasa', 'guard_name' => 'web'],
            ['name' => 'create-repaire', 'label' => 'Tambah Jasa', 'guard_name' => 'web'],
            ['name' => 'update-repaire', 'label' => 'Ubah jasa', 'guard_name' => 'web'],
            ['name' => 'delete-repaire', 'label' => 'Hapus Jasa', 'guard_name' => 'web'],
            //
            ['name' => 'read-customers', 'label' => 'View Pelanggan', 'guard_name' => 'web'],
            ['name' => 'create-customers', 'label' => 'Tambah Pelanggan', 'guard_name' => 'web'],
            ['name' => 'update-customers', 'label' => 'Ubah Pelanggan', 'guard_name' => 'web'],
            ['name' => 'delete-customers', 'label' => 'Hapus Pelanggan', 'guard_name' => 'web'],
            //
            ['name' => 'read-suppliers', 'label' => 'View Supplier', 'guard_name' => 'web'],
            ['name' => 'create-suppliers', 'label' => 'Tambah Supplier', 'guard_name' => 'web'],
            ['name' => 'update-suppliers', 'label' => 'Ubah Supplier', 'guard_name' => 'web'],
            ['name' => 'delete-suppliers', 'label' => 'Hapus Supplier', 'guard_name' => 'web'],
            //
            ['name' => 'read-opnames', 'label' => 'View Opname', 'guard_name' => 'web'],
            ['name' => 'create-opnames', 'label' => 'Tambah Opname', 'guard_name' => 'web'],
            ['name' => 'update-opnames', 'label' => 'Ubah Opname', 'guard_name' => 'web'],
            ['name' => 'delete-opnames', 'label' => 'Hapus Opname', 'guard_name' => 'web'],
            //
            ['name' => 'read-stocks', 'label' => 'View Stok In/Out', 'guard_name' => 'web'],
            ['name' => 'create-stocks', 'label' => 'Tambah Stok In/Out', 'guard_name' => 'web'],
            ['name' => 'delete-stocks', 'label' => 'Hapus Stok In/Out', 'guard_name' => 'web'],
            //
            ['name' => 'read-sales', 'label' => 'View Penjualan', 'guard_name' => 'web'],
            ['name' => 'create-sales', 'label' => 'Tambah Penjualan', 'guard_name' => 'web'],
            ['name' => 'detail-sales', 'label' => 'Detail Penjualan', 'guard_name' => 'web'],
            ['name' => 'print-sales', 'label' => 'Print Nota Penjualan', 'guard_name' => 'web'],
            //
            ['name' => 'read-purchases', 'label' => 'View Pembelian', 'guard_name' => 'web'],
            ['name' => 'create-purchases', 'label' => 'Tambah Pembelian', 'guard_name' => 'web'],
            ['name' => 'detail-purchases', 'label' => 'Detail Pembelian', 'guard_name' => 'web'],
            //
            ['name' => 'read-debt', 'label' => 'View Hutang', 'guard_name' => 'web'],
            ['name' => 'payment-debt', 'label' => 'Pembayaran Hutang', 'guard_name' => 'web'],
            ['name' => 'detail-debt', 'label' => 'Detail Hutang', 'guard_name' => 'web'],
            ['name' => 'delete-debt', 'label' => 'Hapus Hutang', 'guard_name' => 'web'],
            //
            ['name' => 'read-receivable', 'label' => 'View Piutang', 'guard_name' => 'web'],
            ['name' => 'payment-receivable', 'label' => 'Pembayaran Piutang', 'guard_name' => 'web'],
            ['name' => 'detail-receivable', 'label' => 'Detail Piutang', 'guard_name' => 'web'],
            ['name' => 'delete-receivable', 'label' => 'Hapus Piutang', 'guard_name' => 'web'],
            //
            ['name' => 'read-cash', 'label' => 'View Kas', 'guard_name' => 'web'],
            ['name' => 'create-cash', 'label' => 'Tambah Kas', 'guard_name' => 'web'],
            // ['name' => 'detail-cash', 'guard_name' => 'web'],
            ['name' => 'delete-cash', 'label' => 'Hapus Kas', 'guard_name' => 'web'],
            //
            ['name' => 'read-ppn', 'label' => 'View PPN', 'guard_name' => 'web'],
            ['name' => 'create-ppn', 'label' => 'Tambah PPN', 'guard_name' => 'web'],
            // ['name' => 'detail-ppn', 'guard_name' => 'web'],
            ['name' => 'delete-ppn', 'label' => 'Hapus PPN', 'guard_name' => 'web'],
            //
            ['name' => 'daily-report', 'label' => 'Laporan Harian', 'guard_name' => 'web'],
            ['name' => 'sales-report', 'label' => 'Laporan Penjualan', 'guard_name' => 'web'],
            ['name' => 'purchases-report', 'label' => 'Laporan Pembelian', 'guard_name' => 'web'],
            ['name' => 'opnames-report', 'label' => 'Laporan Stok Opname', 'guard_name' => 'web'],
            ['name' => 'stockInOut-report', 'label' => 'Laporan Stok In/Out', 'guard_name' => 'web'],
            ['name' => 'cash-report', 'label' => 'Laporan Kas', 'guard_name' => 'web'],
            ['name' => 'debtsAndReceivables-report', 'label' => 'Laporan Hutang/Piutang', 'guard_name' => 'web'],
            ['name' => 'profit-report', 'label' => 'Laporan Laba Rugi', 'guard_name' => 'web'],
            //
            ['name' => 'read-grafik', 'label' => 'View Grafik', 'guard_name' => 'web'],
            ['name' => 'commission-users', 'label' => 'Komisi Karyawan', 'guard_name' => 'web'],
            //
            ['name' => 'generateBarcode-tools', 'label' => 'View Generate Barcode', 'guard_name' => 'web'],
            ['name' => 'backup-tools', 'label' => 'Backup Data', 'guard_name' => 'web'],
            ['name' => 'deleteServis-tools', 'label' => 'Hapus Service Pertanggal', 'guard_name' => 'web'],
            ['name' => 'deleteTransaction-tools', 'label' => 'Hapus Transaksi Pertanggal', 'guard_name' => 'web'],
            //
            ['name' => 'footerNota-settings', 'label' => 'Footer Nota', 'guard_name' => 'web'],
            ['name' => 'formatWA-settings', 'label' => 'Format WA', 'guard_name' => 'web'],
            ['name' => 'formatSMS-settings', 'label' => 'Format SMS', 'guard_name' => 'web'],
            ['name' => 'daylimit-settings', 'label' => 'Batas Akhir', 'guard_name' => 'web'],
            ['name' => 'profile-settings', 'label' => 'Profil Perusahaan', 'guard_name' => 'web'],
        ]);
    }
}
