<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Datetime;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => "KD 8 EXT",
                'description' => "KD 8 EXT",
                'units' => 10,
                'price' => 100000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2015/11/first-nike-kd-8-ext-release-black-gum-01.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 2,
                'name' => "Jordan Galaxy",
                'description' => "Jordan Galaxy",
                'units' => 20,
                'price' => 200000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2020/04/Air-Jordan-1-Low-Galaxy-CW7309-090-1.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 3,
                'name' => "Nike SB Trainerendor Leathe",
                'description' => "Nike SB Trainerendor Leathe",
                'units' => 30,
                'price' => 300000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2015/11/nike-sb-trainerendor-flax-1.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 4,
                'name' => "Air Jordan Spike 40 iD",
                'description' => "Air Jordan Spike 40 iD",
                'units' => 40,
                'price' => 400000,
                'image' => 'https://i.pinimg.com/originals/cf/8d/e1/cf8de111cf033ceb91f355c4277e605e.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 5,
                'name' => "Nike Air Footscape Magista Flyknit",
                'description' => "Nike Air Footscape Magista Flyknit",
                'units' => 50,
                'price' => 500000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2016/06/nike-air-footscape-magista-flyknit-wolf-grey-1.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 6,
                'name' => "Nike Air Zoom Huarache 2k4",
                'description' => "Nike Air Zoom Huarache 2k4",
                'units' => 60,
                'price' => 600000,
                'image' => 'https://www.kicksonfire.com/wp-content/uploads/2016/05/Nike-Air-Zoom-Huarache-2K41.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 7,
                'name' => "Jordan Horizon",
                'description' => "Jordan Horizon",
                'units' => 70,
                'price' => 700000,
                'image' => 'https://i.ebayimg.com/images/g/wOoAAOSweXliNALh/s-l400.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 8,
                'name' => "Air Jordan xx9 Low",
                'description' => "Air Jordan xx9 Low",
                'units' => 80,
                'price' => 800000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2016/01/air-jordan-29-low-bulls-releasing-soon-01.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 9,
                'name' => "LeBron XIII Premium AS iD",
                'description' => "LeBron XIII Premium AS iD",
                'units' => 90,
                'price' => 900000,
                'image' => 'https://i.ebayimg.com/images/g/ex0AAOSwvwFjxFaQ/s-l1600.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 1,
                'name' => "Air Jordan 1 Retro Hight Nouveau",
                'description' => "Air Jordan 1 Retro Hight Nouveau",
                'units' => 100,
                'price' => 1000000,
                'image' => 'https://sneakernews.com/wp-content/uploads/2015/12/air-jordan-1-mid-nouveau-dunk-from-above-coming-soon-02.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 2,
                'name' => "Nike Air Presto",
                'description' => "Nike Air Presto",
                'units' => 110,
                'price' => 1100000,
                'image' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0e293b0d-0ce3-41fa-9898-9ca3cb7da3ea/air-presto-shoes-QdhgZW.png',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'category_id' => 3,
                'name' => "KD 8 Premium AS iD",
                'description' => "KD 8 Premium AS iD",
                'units' => 120,
                'price' => 1200000,
                'image' => 'https://c.static-nike.com/a/images/f_auto/dpr_1.3,cs_srgb/w_723,c_limit/wufqvhf4ynrmdngjo1zt/kd-8.jpg',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ]
        ];

        DB::table('products')->insert($products);
    }
}
