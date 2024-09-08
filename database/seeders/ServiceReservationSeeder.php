<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceReservationSeeder extends Seeder
{
    public function run()
    {
        $serviceIds = DB::table('services')->pluck('id')->toArray();
        $reservationIds = DB::table('reservations')->pluck('id')->toArray();

        if (empty($serviceIds) || empty($reservationIds)) {
            // Handle empty tables
            $this->command->info('No services or reservations to seed.');
            return;
        }

        foreach (range(1, 20) as $index) {
            DB::table('service_reservations')->insert([
                'id' => 'SR' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'service_id' => $serviceIds[array_rand($serviceIds)],
                'reservation_id' => $reservationIds[array_rand($reservationIds)],
                'quantity' => rand(1, 10), // Using rand() for simplicity
            ]);
        }
    }
}
