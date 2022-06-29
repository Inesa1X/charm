<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procedures = [
            [1, 'Haircut', 1, 20.99],
            [2, 'Hair Colouring', 1, 20.99],
            [3, 'Straightening', 1, 20.99],
            [4, 'Kids haircut', 1, 20.99],
            [5, 'Facial', 2, 20.99],
            [6, 'Make up', 2, 20.99],
            [7, 'Eyebrows', 2, 20.99],
            [8, 'Eyelashes', 2, 20.99],
            [9, 'Massage', 3, 20.99],
            [10, 'Piercing', 3, 20.99],
            [11, 'Waxing', 3, 20.99],
            [12, 'Scrub', 3, 20.99],
            [13, 'Manicure', 4, 20.99],
            [14, 'Pedicure', 4, 20.99],
            [15, 'Gel Polish', 4, 20.99],
            [16, 'Nail Extensions', 4, 20.99],
            [17, 'Haircut', 5, 20.99],
            [18, 'Hair colouring', 5, 20.99],
            [19, 'Beard', 5, 20.99],
            [20, 'Manicure', 5, 20.99]
        ];
        foreach ($procedures as $procedure) {
            DB::table('procedures')->insert([
                'id' => $procedure[0],
                'title' => $procedure[1],
                'category_id' => $procedure[2],
                'price' => $procedure[3]
            ]);
        }
    }
}
