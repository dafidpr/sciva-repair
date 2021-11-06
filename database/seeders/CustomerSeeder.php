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
        $cs->name = "pelanggan";
        $cs->telephone = "081123456789";
        $cs->address = "Jawa Timur";
        $cs->password = bcrypt('pelanggan');
        $cs->type = "umum";
        $cs->save();
    }
}
