<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'BCA'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'OVO'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'GoPay'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Mandiri'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Dana'
        ]);
    }
}
