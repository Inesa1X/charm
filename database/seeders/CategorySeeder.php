<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [1, 'Hair', 'slug', 0],
            [2, 'Face', 'slug', 0],
            [3, 'Body', 'slug', 0],
            [4, 'Nails', 'slug', 0],
            [5, 'Men', 'slug', 0]
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'id' => $category[0],
                'title' => $category[1],
//                'slug' => $category[2],
//                'parent_id' => $category[3]
            ]);

        }
    }
}
