<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 7,
            'quantity' => 1
        ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 12,
            'quantity' => 9
        ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 11,
            'quantity' => 2
        ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 2,
            'product_id' => 2,
            'quantity' => 4
        ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 2,
            'product_id' => 18,
            'quantity' => 2
        ]);
    }
}
