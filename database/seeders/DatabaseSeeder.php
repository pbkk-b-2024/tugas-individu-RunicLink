<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables
        DB::table('guests')->truncate();
        DB::table('rooms')->truncate();
        DB::table('reservations')->truncate();
        DB::table('services')->truncate();
        DB::table('service_reservations')->truncate();
        DB::table('payments')->truncate();
        DB::table('employees')->truncate();
        DB::table('room_services')->truncate();
        DB::table('facilities')->truncate();
        DB::table('facility_reservations')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Call individual seeders
        $this->call([
            GuestSeeder::class,
            RoomSeeder::class,
            ReservationSeeder::class,
            ServiceSeeder::class,
            ServiceReservationSeeder::class,
            PaymentSeeder::class,
            EmployeeSeeder::class,
            RoomServiceSeeder::class,
            FacilitySeeder::class,
            FacilityReservationSeeder::class,
        ]);
    }
}
