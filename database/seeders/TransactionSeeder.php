<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'user_id' => 2,
            'shipping_id' => 3,
            'payment_method_id' => 2,
            'transaction_date' => now()
        ]);
        DB::table('transactions')->insert([
            'user_id' => 2,
            'shipping_id' => 1,
            'payment_method_id' => 1,
            'transaction_date' => now(),
            'status' => 'success'
        ]);
    }
}
