<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            RepaireServiceSeeder::class,
            StockOpnameSeeder::class,
            StockSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
