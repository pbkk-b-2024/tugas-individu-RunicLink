<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('rooms')->insert([
                'id' => 'R' . str_pad($index, 5, '0', STR_PAD_LEFT),
                'room_number' => $faker->unique()->numerify('###'),
                'type' => $faker->randomElement(['Single', 'Double', 'Suite']),
                'price_per_night' => $faker->randomFloat(2, 100000, 900000),
                'status' => $faker->randomElement(['Available', 'Occupied']),
            ]);
        }
    }
}
