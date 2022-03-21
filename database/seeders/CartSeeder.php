<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'user_id' => 2,
            'product_id' => 1,
            'quantity' => 4
        ]);
        DB::table('carts')->insert([
            'user_id' => 2,
            'product_id' => 5,
            'quantity' => 2
        ]);
    }
}
