<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $stock = new Stock();
        $stock->product_id = 3;
        $stock->total = 5;
        $stock->value = 100000;
        $stock->type = "in";
        $stock->description = "oke";
        $stock->save();

        $stock = new Stock();
        $stock->product_id = 1;
        $stock->total = 5;
        $stock->value = 100000;
        $stock->type = "in";
        $stock->description = "oke";
        $stock->save();

        $stock = new Stock();
        $stock->product_id = 2;
        $stock->total = 5;
        $stock->value = 100000;
        $stock->type = "in";
        $stock->description = "oke";
        $stock->save();
    }
}
