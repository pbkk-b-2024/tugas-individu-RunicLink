<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        DB::table('facilities')->insert([
            ['id' => 'F00001', 'name' => 'Gym', 'description' => 'Gym dengan peralatan yang lengkap'],
            ['id' => 'F00002', 'name' => 'Swimming Pool', 'description' => 'Swimming Pool dengan pemandangan yang indah'],
            ['id' => 'F00003', 'name' => 'Gaming Room', 'description' => 'Ruangan dengan komputer dan console untuk bermain'],
        ]);
    }
}
