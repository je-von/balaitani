<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                // 'name' => $faker->productName,
                'name' => 'Product Tani Dummy ' . $i,
                'price' => $faker->numberBetween(1000, 100000),
                'stock' => $faker->numberBetween(3, 200),
                'description' => $faker->paragraph(5),
                'seller_id' => $faker->numberBetween(2, 4),
                // 'image' => 'https://cf.shopee.co.id/file/4d58894ade24ab45f868b1e819abd2b1',
                'image' => 'images/4d58894ade24ab45f868b1e819abd2b1.jpg'
                // 'image' => 'images/' . $faker->image('public/storage/images', 640, 480, 'hasil tani', false),
            ]);
        }
    }
}
