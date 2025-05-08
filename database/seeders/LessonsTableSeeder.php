<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear registros de ejemplo en la tabla lessons
        DB::table('lessons')->insert([
            'description' => 'Clase de Lengua castellana y literatura',
            'location' => 'Aula 199',
            'teacher_id' => 2, 
            'group_id' => 3,
            'starts_at' => '09:00:00',
            'ends_at' => '10:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('lessons')->insert([
            'description' => 'Clase de Geografía e historia',
            'location' => 'Aula 75',
            'teacher_id' => 5, 
            'group_id' => 1,
            'starts_at' => '13:30:00',
            'ends_at' => '14:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('lessons')->insert([
            'description' => 'Clase de Programación ',
            'location' => 'Aula 301',
            'teacher_id' => 4, 
            'group_id' => 2,
            'starts_at' => '11:30:00',
            'ends_at' => '12:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
