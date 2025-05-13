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
        // Crea 2 registros conlos que hacer pruebas en la tabla teachers
        DB::table('teachers')->insert([
            'name' => 'Isabel',
            'last_name_1' => 'Herrera',
            'last_name_2' => 'Nuñez',
            'image' => null,
            'email' => 'isabelHerrera@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teachers')->insert([
            'name' => 'Pedro',
            'last_name_1' => 'Quevedo',
            'last_name_2' => 'Linton',
            'image' => null,
            'email' => 'Quevedo@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear una instancia de Faker para generar datos aleatorios
        $faker = Faker::create();

        // Crear 28 registros de ejemplo en la tabla teachers
        for ($i = 0; $i < 28; $i++) {
            DB::table('teachers')->insert([
                'name' => $faker->firstName,
                'last_name_1' => $faker->lastName,
                'last_name_2' => $faker->optional()->lastName,
                'image' => null,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
