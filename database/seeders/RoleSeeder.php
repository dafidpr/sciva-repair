<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;

use Illuminate\Database\Seeder;

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

        $admin->givePermissionTo(['read-products', 'update-products', 'create-products', 'delete-products']);
    }
}
