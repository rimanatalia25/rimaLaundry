<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this-> call(UserSeeder::class); 
        // \App\Models\Member::factory(100)->create();
        // \App\Models\Outlet::factory(100)->create();
        // \App\Models\Paket::factory(100)->create();
        // \App\Models\Inventaris::factory(100)->create();


    }
}
