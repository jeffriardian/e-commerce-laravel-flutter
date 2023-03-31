<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Datetime;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => "Lifestyle",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Running",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Training & Gym",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Basketball",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Football",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Soccer",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Baseball",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Golf",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'name' => "Skateboarding",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
