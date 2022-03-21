<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'address' => $faker->address,
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Jevon',
            'email' => 'jevon@mail.com',
            'password' => bcrypt('jevon123'),
            'address' => $faker->address,
        ]);
        DB::table('users')->insert([
            'name' => 'Louis',
            'email' => 'louis@mail.com',
            'password' => bcrypt('louis123'),
            'address' => $faker->address,
        ]);
        DB::table('users')->insert([
            'name' => 'Beni',
            'email' => 'beni@mail.com',
            'password' => bcrypt('beni123'),
            'address' => $faker->address,
        ]);
    }
}
