<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new Product();
        $product->barcode = "00001";
        $product->name = "battery";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 0;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();

        $product = new Product();
        $product->barcode = "00002";
        $product->name = "case A";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 0;
        $product->limit = 5;
        $product->supplier_id = 2;
        $product->save();

        $product = new Product();
        $product->barcode = "00003";
        $product->name = "case B";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 0;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();
    }
}
