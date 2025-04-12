<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 3 registros de ejemplo en la tabla classes
        DB::table('classes')->insert([
            'description' => 'Clase de Lengua castellana y literatura',
            'location' => 'Aula 199',
            'teacher_id' => 2, 
            'group_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('classes')->insert([
            'description' => 'Clase de Geografía e historia',
            'location' => 'Aula 75',
            'teacher_id' => 5, 
            'group_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('classes')->insert([
            'description' => 'Clase de Programación ',
            'location' => 'Aula 301',
            'teacher_id' => 4, 
            'group_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
