<?php

namespace Database\Seeders;

use App\Models\Company_profile;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Company_profile::create([
            'name' => 'SCIVA REPAIRE CENTER',
            'address' => 'JL.OKE',
            'telephone' => '081123123',
            'fax' => '(0333) 000',
            'email' => "SCIVA@GMAIL.COM",
            'instagram' => '@SCIVA',
            'logo' => NULL
        ]);
    }
}
