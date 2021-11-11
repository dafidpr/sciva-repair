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
        $user = User::create([
            'name' => 'admin',
            'telephone' => '081234123123',
            'address' => 'Banyuwangi',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'login_at' => null,
            'logout_at' => null
        ]);

        $user->assignRole('admin');
        $user = User::create([
            'name' => 'kasir',
            'telephone' => '081111111111',
            'address' => 'Banyuwangi',
            'username' => 'kasir',
            'password' => password_hash('kasir', PASSWORD_DEFAULT),
            'login_at' => null,
            'logout_at' => null
        ]);
        $user->assignRole('kasir');
    }
}
