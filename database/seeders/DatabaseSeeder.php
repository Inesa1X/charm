<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\User::factory(10)->create();
//        \App\Models\Role::factory()->times(10)->create();

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            ProcedureSeeder::class,
            SalonSeeder::class,
            ProcedureSalonSeeder::class
        ]);





    }
}

