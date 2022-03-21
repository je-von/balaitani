<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
            'name' => 'JNE',
            'price' => 9000
        ]);
        DB::table('shippings')->insert([
            'name' => 'J&T',
            'price' => 8500
        ]);
        DB::table('shippings')->insert([
            'name' => 'SiCepat',
            'price' => 8000
        ]);
    }
}
