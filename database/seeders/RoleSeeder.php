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
        $admin->givePermissionTo(['read-products', 'create-products', 'update-products', 'delete-products']);
        $admin->givePermissionTo(['read-users', 'create-users', 'update-users', 'delete-users']);
        $admin->givePermissionTo(['create-roles', 'update-roles', 'delete-roles', 'change-permissions']);
        $admin->givePermissionTo(['create-repaire', 'update-repaire', 'delete-repaire']);

        //kasir
        $kasir->givePermissionTo('read-products');
    }
}
