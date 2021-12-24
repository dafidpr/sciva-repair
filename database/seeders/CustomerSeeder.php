<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cs = new Customer();
        $cs->name = "umum";
        $cs->telephone = "00";
        $cs->address = "umum";
        $cs->password = bcrypt('umum');
        $cs->type = "umum";
        $cs->save();
        $cs = new Customer();
        $cs->name = "pelanggan";
        $cs->telephone = "080123456789";
        $cs->address = "Jawa Timur";
        $cs->password = bcrypt('080123456789');
        $cs->type = "member";
        $cs->save();
        $cs = new Customer();
        $cs->name = "pelanggan2";
        $cs->telephone = "082123456789";
        $cs->address = "Jawa Barat";
        $cs->password = bcrypt('082123456789');
        $cs->type = "umum";
        $cs->save();
        $cs = new Customer();
        $cs->name = "pelanggan";
        $cs->telephone = "083123456789";
        $cs->address = "Jawa Tengah";
        $cs->password = bcrypt('083123456789');
        $cs->type = "umum";
        $cs->save();
    }
}
