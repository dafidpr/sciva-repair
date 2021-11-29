<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sale::create([
            'user_id' => 2,
            'customer_id' => 1,
            'invoice' => 'POS202002110001',
            'method' => 'cash',
            'total' => 10000,
            'payment' => 10000,
            'cashback' => 0,
            'vat_tax' => 0
        ]);
        Sale::create([
            'user_id' => 2,
            'customer_id' => 2,
            'invoice' => 'POS202002110002',
            'method' => 'cash',
            'total' => 10000,
            'payment' => 10000,
            'cashback' => 0,
            'vat_tax' => 0
        ]);
        Sale::create([
            'user_id' => 3,
            'customer_id' => 3,
            'invoice' => 'POS202002110003',
            'method' => 'cash',
            'total' => 10000,
            'payment' => 10000,
            'cashback' => 0,
            'vat_tax' => 0
        ]);
    }
}
