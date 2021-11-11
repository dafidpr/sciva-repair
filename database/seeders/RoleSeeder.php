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
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $kasir = Role::create([
            'name' => 'kasir',
            'guard_name' => 'web'
        ]);

        $admin->givePermissionTo(['read-products', 'create-products', 'update-products', 'delete-products']);
        $kasir->givePermissionTo('read-products');
    }
}
