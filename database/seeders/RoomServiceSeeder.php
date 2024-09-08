<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomServiceSeeder extends Seeder
{
    public function run()
    {
        $roomIds = DB::table('rooms')->pluck('id')->toArray();
        $employeeIds = DB::table('employees')->pluck('id')->toArray();

        if (empty($roomIds) || empty($employeeIds)) {
            $this->command->info('No rooms or employees to seed.');
            return;
        }

        foreach (range(1, 20) as $index) {
            DB::table('room_services')->insert([
                'id' => 'RS' . str_pad($index, 4, '0', STR_PAD_LEFT), // Format ID to RS0001
                'room_id' => $roomIds[array_rand($roomIds)],
                'employee_id' => $employeeIds[array_rand($employeeIds)],
                'service_date' => now()->subDays(rand(1, 30))->toDateString(),
            ]);
        }
    }
}
