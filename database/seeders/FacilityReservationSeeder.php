<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityReservationSeeder extends Seeder
{
    public function run()
    {
        $facilityIds = DB::table('facilities')->pluck('id')->toArray();
        $reservationIds = DB::table('reservations')->pluck('id')->toArray();

        if (empty($facilityIds) || empty($reservationIds)) {
            $this->command->info('No facilities or reservations to seed.');
            return;
        }

        foreach (range(1, 20) as $index) {
            DB::table('facility_reservations')->insert([
                'id' => 'FR' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'facility_id' => $facilityIds[array_rand($facilityIds)],
                'reservation_id' => $reservationIds[array_rand($reservationIds)],
                'usage_date' => now()->subDays(rand(1, 30))->toDateString(),
            ]);
        }
    }
}
