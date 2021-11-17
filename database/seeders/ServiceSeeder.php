<?php

namespace Database\Seeders;

use App\Models\Transaction_service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaction_service::create([
            'customer_id' => 1,
            "transaction_code" => 'SRV202109100001',
            'unit' => 'samsung A1',
            'serial_number' => 0000001,
            'complient' => "battery Low",
            'completenes' => 'Handphone & charger',
            'passcode' => '12ok',
            'notes' => 'Oke',
            'service_date' => date('y-m-d'),
            'estimated_cost' => 200000,
            'pickup_date' => null,
            'payment_method' => null,
            'payment' => null,
            'cashback' => null,
            'status' => 'proses'
        ]);

        Transaction_service::create([
            'customer_id' => 1,
            "transaction_code" => 'SRV202109100002',
            'unit' => 'samsung C1',
            'serial_number' => 0000002,
            'complient' => "battery Low",
            'completenes' => 'Handphone & charger',
            'passcode' => '12ok',
            'notes' => 'Oke',
            'service_date' => date('y-m-d'),
            'estimated_cost' => 200000,
            'pickup_date' => '2021-11-20',
            'payment_method' => 'cash',
            'payment' => 200000,
            'cashback' => 0,
            'status' => 'proses'
        ]);
    }
}
