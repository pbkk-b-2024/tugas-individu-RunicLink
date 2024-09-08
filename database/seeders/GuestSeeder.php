<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GuestSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('guests')->insert([
                'id' => 'G' . str_pad($index, 5, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone_number' => substr($faker->phoneNumber, 0, 15), // Truncate to 15 characters
                'address' => $faker->address,
            ]);
        }
    }
}
