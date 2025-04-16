<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 5 registros de ejemplo en la tabla teachers
        DB::table('teachers')->insert([
            'name' => 'Julio',
            'last_name_1' => 'Martínez',
            'last_name_2' => 'Soria',
            'image' => null,
            'email' => 'julioMSoria@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a false
            // 'is_admin' => false, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teachers')->insert([
            'name' => 'Olga',
            'last_name_1' => 'García',
            'last_name_2' => 'Delgado',
            'image' => null,
            'email' => 'olgaDelgado@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a false
            // 'is_admin' => false, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teachers')->insert([
            'name' => 'Samuel',
            'last_name_1' => 'Castillejo',
            'last_name_2' => 'Sánchez',
            'image' => null,
            'email' => 'samuCastillejo@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a false
            // 'is_admin' => false, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teachers')->insert([
            'name' => 'Isabel',
            'last_name_1' => 'Herrera',
            'last_name_2' => 'Nuñez',
            'image' => null,
            'email' => 'isabelHerrera@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a false
            // 'is_admin' => false, 
            // 'is_active' => false,
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
            // Por defecto están a false
            // 'is_admin' => false, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
