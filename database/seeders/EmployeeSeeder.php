<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('employees')->insert([
                'id' => 'E' . str_pad($index, 5, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'position' => $faker->jobTitle,
                'salary' => $faker->randomFloat(2, 1000000, 10000000), // Salary between 1 million and 10 million
                'hire_date' => $faker->date(),
            ]);
        }
    }
}
