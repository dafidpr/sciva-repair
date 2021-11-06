<?php

namespace Database\Seeders;

use App\Models\Repaire_service;
use Illuminate\Database\Seeder;

class RepaireServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new Repaire_service();
        $product->repaire_code = "JS00001";
        $product->name = "service 10K";
        $product->price = 10000;
        $product->save();

        $product = new Repaire_service();
        $product->repaire_code = "JS00002";
        $product->name = "service 15K";
        $product->price = 15000;
        $product->save();

        $product = new Repaire_service();
        $product->repaire_code = "JS00003";
        $product->name = "service 20K";
        $product->price = 20000;
        $product->save();
    }
}
