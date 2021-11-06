<?php

namespace Database\Seeders;

use App\Models\Stock_opname;
use Illuminate\Database\Seeder;

class StockOpnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $opname = new Stock_opname();
        $opname->product_id = 1;
        $opname->stock = 5;
        $opname->real_stock = 5;
        $opname->difference_stock = 0;
        $opname->value = 1;
        $opname->description = "oke";
        $opname->save();

        $opname = new Stock_opname();
        $opname->product_id = 2;
        $opname->stock = 5;
        $opname->real_stock = 5;
        $opname->difference_stock = 0;
        $opname->value = 1;
        $opname->description = "oke";
        $opname->save();

        $opname = new Stock_opname();
        $opname->product_id = 1;
        $opname->stock = 15;
        $opname->real_stock = 5;
        $opname->difference_stock = 0;
        $opname->value = 1;
        $opname->description = "oke";
        $opname->save();
    }
}
