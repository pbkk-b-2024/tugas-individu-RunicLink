<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('reservations')->insert([
                'id' => 'RE' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'guest_id' => DB::table('guests')->inRandomOrder()->first()->id,
                'room_id' => DB::table('rooms')->inRandomOrder()->first()->id,
                'check_in_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'check_out_date' => $faker->dateTimeBetween('now', '+1 month'),
                'status' => $faker->randomElement(['Booked', 'Checked-in', 'Checked-out', 'Canceled']),
            ]);
        }
    }
}
