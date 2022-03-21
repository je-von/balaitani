<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(TransactionDetailSeeder::class);
    }
}
