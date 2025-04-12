<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 3 registros de ejemplo en la tabla exits
        DB::table('exits')->insert([
            'is_solved' => true,
            'student_id' => 5, 
            'teacher_id' => 4,
            'class_id' => 2,
            'created_at' => '2025-04-12 12:05:48',
            'updated_at' => '2025-04-12 12:07:08',
        ]);
        DB::table('exits')->insert([
            'description' => 'El estudiante se ha mareado momentaneamente',
            'is_solved' => false,
            'student_id' => 1, 
            'teacher_id' => 3,
            'class_id' => 1,
            'created_at' => '2025-05-12 10:15:01',
            'updated_at' => now(),
        ]);
    }
}
