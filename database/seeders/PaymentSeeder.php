<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('payments')->insert([
                'id' => 'P' . str_pad($index, 5, '0', STR_PAD_LEFT),
                'reservation_id' => DB::table('reservations')->inRandomOrder()->first()->id,
                'amount' => $faker->randomFloat(2, 100000, 1000000),
                'payment_date' => $faker->date(),
                'payment_method' => $faker->randomElement(['Credit Card', 'Cash', 'Bank Transfer']),
            ]);
        }
    }
}
