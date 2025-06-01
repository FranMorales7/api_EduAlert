<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('trips')->insert([
            [
                'description' => 'El estudiante sufrió una leve caída durante la actividad física',
                'is_solved' => true,
                'student_id' => 5, 
                'teacher_id' => 4,
                'lesson_id' => 2,
                'created_at' => '2025-04-12 12:05:48',
                'updated_at' => '2025-04-12 12:07:08',
            ],
            [
                'description' => 'El estudiante se ha mareado momentáneamente',
                'is_solved' => false,
                'student_id' => 1, 
                'teacher_id' => 3,
                'lesson_id' => 1,
                'created_at' => '2025-05-12 10:15:01',
                'updated_at' => now(),
            ]
        ]);
    }
}
