<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [1, "Vilnius"],
            [2, "Kaunas"],
            [3, "Klaipėda"],
            [4, "Šiauliai"],
            [5, "Druskininkai"],
            [6, "Palanga"],
            [7, "Panevėžys"],
        ];

        foreach ($cities as $key => $city) {
            DB::table('cities')->insert([
                'title' => $city[1]
            ]);
        }
    }
}
