<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Purchase::create([
            'invoice' => 'PB202010210001',
            'supplier_id' => 1,
            'user_id' => 2,
            'discount' => 0,
            'total' => 100000,
            'method' => 'cash',
            'payment' => 100000,
            'cashback' => 0
        ]);
        Purchase::create([
            'invoice' => 'PB202010210002',
            'supplier_id' => 2,
            'user_id' => 2,
            'discount' => 0,
            'total' => 100000,
            'method' => 'cash',
            'payment' => 100000,
            'cashback' => 0
        ]);
        Purchase::create([
            'invoice' => 'PB202010210003',
            'supplier_id' => 1,
            'user_id' => 3,
            'discount' => 0,
            'total' => 100000,
            'method' => 'cash',
            'payment' => 100000,
            'cashback' => 0
        ]);
    }
}
