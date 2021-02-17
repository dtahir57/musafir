<?php

use Illuminate\Database\Seeder;
use App\User;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->password = bcrypt('password');
        $user->email = 'admin@gmail.com';
        $user->save();

        $user->assignRole('Super_User');
    }
}
