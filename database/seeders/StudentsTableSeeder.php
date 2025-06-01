<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $students = [];

        for ($i = 0; $i < 25; $i++) {
            $students[] = [
                'name' => $faker->firstName,
                'last_name_1' => $faker->lastName,
                'last_name_2' => $faker->optional()->lastName,
                'birthdate' => $faker->dateTimeBetween('-18 years', '-12 years')->format('Y-m-d'),
                'contact' => $faker->unique()->safeEmail,
                'group_id' => $faker->numberBetween(1, 18),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('students')->insert($students);
    }
}
