<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 3 registros de ejemplo en la tabla incidents
        DB::table('incidents')->insert([
            'description' => 'El estudiante ha lanzado un avión de papel a la mesa del profesor, por lo que ha sido reprendido y amonestado con un parte disciplinario.',
            'is_solved' => true,
            'student_id' => 2, 
            'teacher_id' => 3,
            'class_id' => 2,
            'created_at' => '2025-04-14 12:05:48',
            'updated_at' => '2025-04-16 12:10:08',
        ]);
        DB::table('incidents')->insert([
            'description' => 'El estudiante ha salido del aula alegando que se estaba aburriendo en clase',
            'is_solved' => false,
            'student_id' => 8, 
            'teacher_id' => 1,
            'class_id' => 3,
            'created_at' => '2025-05-12 10:15:01',
            'updated_at' => now(),
        ]);
    }
}
