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
        $product->barcode = "0000123456";
        $product->name = "battery";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 10;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();

        $product = new Product();
        $product->barcode = "000021234";
        $product->name = "case A";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 10;
        $product->limit = 5;
        $product->supplier_id = 2;
        $product->save();

        $product = new Product();
        $product->barcode = "0000312345";
        $product->name = "case B";
        $product->selling_price = 50000;
        $product->purchase_price = 45000;
        $product->member_price = 43000;
        $product->stock = 10;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();

        $product = new Product();
        $product->barcode = "0000412345";
        $product->name = "TouchScreen";
        $product->selling_price = 150000;
        $product->purchase_price = 100000;
        $product->member_price = 130000;
        $product->stock = 10;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();

        $product = new Product();
        $product->barcode = "00005123456";
        $product->name = "earphone";
        $product->selling_price = 40000;
        $product->purchase_price = 30000;
        $product->member_price = 35000;
        $product->stock = 10;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();

        $product = new Product();
        $product->barcode = "00006123456";
        $product->name = "Charger";
        $product->selling_price = 30000;
        $product->purchase_price = 25000;
        $product->member_price = 27000;
        $product->stock = 5;
        $product->limit = 5;
        $product->supplier_id = 1;
        $product->save();
    }
}
