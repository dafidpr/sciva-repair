<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $developer = Role::create([
            'name' => 'developer',
            'guard_name' => 'web'
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $kasir = Role::create([
            'name' => 'kasir',
            'guard_name' => 'web'
        ]);

        //develper
        $developer->givePermissionTo(Permission::all());

        //admin
        $admin->givePermissionTo(['read-services', 'create-services', 'update-services', 'detail-services', 'delete-services', 'restore-services', 'printNota-services', 'take-services', 'call-services']);
        $admin->givePermissionTo(['read-products', 'create-products', 'update-products', 'delete-products']);
        $admin->givePermissionTo(['read-users', 'create-users', 'update-users', 'delete-users', 'changePass-users']);
        $admin->givePermissionTo(['read-roles', 'create-roles', 'update-roles', 'delete-roles', 'changePermissions-roles']);
        $admin->givePermissionTo(['read-repaire', 'create-repaire', 'update-repaire', 'delete-repaire']);
        $admin->givePermissionTo(['read-customers', 'create-customers', 'update-customers', 'delete-customers', 'changePassword-customers']);
        $admin->givePermissionTo(['read-suppliers', 'create-suppliers', 'update-suppliers', 'delete-suppliers']);
        $admin->givePermissionTo(['read-opnames', 'create-opnames', 'update-opnames', 'delete-opnames']);
        $admin->givePermissionTo(['read-stocks', 'create-stocks', 'delete-stocks']);
        $admin->givePermissionTo(['read-sales', 'create-sales', 'detail-sales', 'print-sales']);
        $admin->givePermissionTo(['read-purchases', 'create-purchases', 'detail-purchases']);
        $admin->givePermissionTo(['read-debt', 'payment-debt', 'detail-debt', 'delete-debt']);
        $admin->givePermissionTo(['read-receivable', 'payment-receivable', 'detail-receivable', 'delete-receivable']);
        $admin->givePermissionTo(['read-cash', 'create-cash', 'delete-cash']);
        $admin->givePermissionTo(['read-ppn', 'create-ppn', 'delete-ppn']);
        $admin->givePermissionTo(['daily-report', 'sales-report', 'purchases-report', 'opnames-report', 'stockInOut-report', 'cash-report', 'debtsAndReceivables-report', 'profit-report',]);
        $admin->givePermissionTo(['read-grafik']);
        $admin->givePermissionTo(['commission-users']);
        $admin->givePermissionTo(['generateBarcode-tools', 'backup-tools', 'deleteServis-tools', 'deleteTransaction-tools']);
        $admin->givePermissionTo(['footerNota-settings', 'formatWA-settings', 'formatSMS-settings', 'daylimit-settings', 'profile-settings']);

        //kasir
        $kasir->givePermissionTo('read-products');
    }
}
