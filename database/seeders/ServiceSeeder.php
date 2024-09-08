<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            ['id' => 'S00001', 'name' => 'Laundry', 'price' => 25000.00],
            ['id' => 'S00002', 'name' => 'Massage', 'price' => 200000.00],
            ['id' => 'S00003', 'name' => 'Restoran', 'price' => 250000.00],
        ]);
    }
}
