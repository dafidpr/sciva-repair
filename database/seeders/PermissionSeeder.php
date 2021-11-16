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
            ['name' => 'read-products', 'guard_name' => 'web'],
            ['name' => 'create-products', 'guard_name' => 'web'],
            ['name' => 'update-products', 'guard_name' => 'web'],
            ['name' => 'delete-products', 'guard_name' => 'web'],
            //
            ['name' => 'read-users', 'guard_name' => 'web'],
            ['name' => 'create-users', 'guard_name' => 'web'],
            ['name' => 'update-users', 'guard_name' => 'web'],
            ['name' => 'delete-users', 'guard_name' => 'web'],
            //
            ['name' => 'read-roles', 'guard_name' => 'web'],
            ['name' => 'create-roles', 'guard_name' => 'web'],
            ['name' => 'update-roles', 'guard_name' => 'web'],
            ['name' => 'delete-roles', 'guard_name' => 'web'],
            ['name' => 'change-permissions', 'guard_name' => 'web'],
            //
            ['name' => 'read-repaire', 'guard_name' => 'web'],
            ['name' => 'create-repaire', 'guard_name' => 'web'],
            ['name' => 'update-repaire', 'guard_name' => 'web'],
            ['name' => 'delete-repaire', 'guard_name' => 'web'],
            //
            ['name' => 'read-customers', 'guard_name' => 'web'],
            ['name' => 'create-customers', 'guard_name' => 'web'],
            ['name' => 'update-customers', 'guard_name' => 'web'],
            ['name' => 'delete-customers', 'guard_name' => 'web'],
            //
            ['name' => 'read-suppliers', 'guard_name' => 'web'],
            ['name' => 'create-suppliers', 'guard_name' => 'web'],
            ['name' => 'update-suppliers', 'guard_name' => 'web'],
            ['name' => 'delete-suppliers', 'guard_name' => 'web'],
            //
            ['name' => 'read-opnames', 'guard_name' => 'web'],
            ['name' => 'create-opnames', 'guard_name' => 'web'],
            ['name' => 'update-opnames', 'guard_name' => 'web'],
            ['name' => 'delete-opnames', 'guard_name' => 'web'],
        ]);
    }
}
