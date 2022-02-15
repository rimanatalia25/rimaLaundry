<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt ('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'admin'
            ],
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt ('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'owner'
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt ('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'kasir'
            ]


        ];

        DB::table('users') -> insert($users);

    }
}
