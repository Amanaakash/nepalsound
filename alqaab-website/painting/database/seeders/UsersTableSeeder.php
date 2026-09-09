<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = array(
            array(
                'name' => 'Keshar Kalikote',
                'email' => 'kesharkalikote6@gmail.com',
                'mobile' => 9849448466,
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => new DateTime(),
                'created_at' => new DateTime(),
            )
        );

        DB::table('users')->insert($user_list);
    }
}
