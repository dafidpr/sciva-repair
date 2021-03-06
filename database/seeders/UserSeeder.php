<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $developer = User::create([
            'name' => 'developer',
            'telephone' => '00000000',
            'address' => 'Banyuwangi',
            'username' => 'root',
            'password' => password_hash('root', PASSWORD_DEFAULT),
            'commission' => '10',
            'login_at' => null,
            'logout_at' => null
        ]);

        $developer->assignRole('developer');

        $admin = User::create([
            'name' => 'admin',
            'telephone' => '081234123123',
            'address' => 'Banyuwangi',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'commission' => '10',
            'login_at' => null,
            'logout_at' => null
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'kasir',
            'telephone' => '081111111111',
            'address' => 'Banyuwangi',
            'username' => 'kasir',
            'password' => password_hash('kasir', PASSWORD_DEFAULT),
            'commission' => '10',
            'login_at' => null,
            'logout_at' => null
        ]);
        $kasir->assignRole('kasir');
    }
}
