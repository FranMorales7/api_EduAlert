<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder
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

        // Crear 10 registros de ejemplo en la tabla teachers
        for ($i = 0; $i < 10; $i++) {
            DB::table('teachers')->insert([
                'name' => $faker->firstName,
                'last_name_1' => $faker->lastName,
                'last_name_2' => $faker->optional()->lastName,
                'image' => $faker->imageUrl(200, 200, 'people'),
                'e-mail' => $faker->unique()->safeEmail,
                'password' => bcrypt('password123'), // Contraseña cifrada
                'is_admin' => $faker->boolean, // Random boolean (true/false)
                'is_active' => true, // Puedes cambiar esto si quieres asignar aleatoriamente
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
