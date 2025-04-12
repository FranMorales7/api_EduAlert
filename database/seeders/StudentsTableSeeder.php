<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear una instancia de Faker para generar datos aleatorios
        $faker = Faker::create();

        // Crear 10 registros de ejemplo en la tabla students
        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'name' => $faker->firstName,
                'last_name_1' => $faker->lastName,
                'last_name_2' => $faker->optional()->lastName,
                'birthdate' => $faker->dateTimeBetween('-17 years', '-12 years')->format('Y-m-d'), // Edad comprendida entre los 12  y los 17 años
                'image' => $faker->imageUrl(200, 200, 'people'),
                'contact' => $faker->unique()->safeEmail,
                'group_id' => $faker->numberBetween(1,3), // id entre 1 y 3
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
