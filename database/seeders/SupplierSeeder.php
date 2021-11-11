<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $supplier = new Supplier();
        $supplier->supplier_code = "SPL00003";
        $supplier->name = "CV Putra Mas";
        $supplier->telephone = "0851234567892";
        $supplier->bank = 'bni';
        $supplier->account_number = "123443000";
        $supplier->bank_account_name = "Putra mas";
        $supplier->address = "Kitabalu";
        $supplier->save();

        $supplier = new Supplier();
        $supplier->supplier_code = "SPL00004";
        $supplier->name = "CV Angkasa Mas";
        $supplier->telephone = "0851234567891";
        $supplier->bank = 'bni';
        $supplier->account_number = "123443002";
        $supplier->bank_account_name = "angkasa";
        $supplier->address = "Jakarta barat";
        $supplier->save();

        $supplier = new Supplier();
        $supplier->supplier_code = "SPL00005";
        $supplier->name = "CV Merpati";
        $supplier->telephone = "0851234567890";
        $supplier->bank = 'bni';
        $supplier->account_number = "123443003";
        $supplier->bank_account_name = "merpati";
        $supplier->address = "Surabaya";
        $supplier->save();
    }
}
