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
        $user = new User();
        $user->name = "admin";
        $user->telephone = "081234123123";
        $user->address = "Banyuwangi";
        $user->username = 'admin';
        $user->password = bcrypt("admin");
        $user->login_at = null;
        $user->logout_at = null;
        $user->save();
    }
}
