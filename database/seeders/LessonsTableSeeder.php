<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        $lessons = [
            ['description' => 'Lengua castellana y literatura', 'location_id' => 1, 'teacher_id' => 1, 'group_id' => 1, 'day' => 2, 'starts_at' => '08:00:00', 'ends_at' => '09:00:00'],
            ['description' => 'Matemáticas', 'location_id' => 2, 'teacher_id' => 2, 'group_id' => 2, 'day' => 5, 'starts_at' => '08:00:00', 'ends_at' => '09:00:00'],
            ['description' => 'Biología', 'location_id' => 3, 'teacher_id' => 3, 'group_id' => 3, 'day' => 3, 'starts_at' => '09:00:00', 'ends_at' => '10:00:00'],
            ['description' => 'Geografía e historia', 'location_id' => 4, 'teacher_id' => 4, 'group_id' => 4, 'day' => 3, 'starts_at' => '09:00:00', 'ends_at' => '10:00:00'],
            ['description' => 'Educación Física', 'location_id' => 5, 'teacher_id' => 5, 'group_id' => 5, 'day' => 1, 'starts_at' => '10:00:00', 'ends_at' => '11:00:00'],
            ['description' => 'Física y Química', 'location_id' => 6, 'teacher_id' => 6, 'group_id' => 6, 'day' => 5, 'starts_at' => '10:00:00', 'ends_at' => '11:00:00'],
            ['description' => 'Tecnología', 'location_id' => 7, 'teacher_id' => 7, 'group_id' => 7, 'day' => 1, 'starts_at' => '11:00:00', 'ends_at' => '12:00:00'],
            ['description' => 'Música', 'location_id' => 8, 'teacher_id' => 8, 'group_id' => 8, 'day' => 2, 'starts_at' => '11:00:00', 'ends_at' => '12:00:00'],
            ['description' => 'Formación y orientación laboral', 'location_id' => 9, 'teacher_id' => 9, 'group_id' => 9, 'day' => 4, 'starts_at' => '12:00:00', 'ends_at' => '13:00:00'],
            ['description' => 'Ciencias Aplicadas', 'location_id' => 18, 'teacher_id' => 10, 'group_id' => 10, 'day' => 4, 'starts_at' => '12:00:00', 'ends_at' => '13:00:00'],
            ['description' => 'Sistemas microinformáticos', 'location_id' => 10, 'teacher_id' => 11, 'group_id' => 11, 'day' => 1, 'starts_at' => '13:00:00', 'ends_at' => '14:00:00'],
            ['description' => 'Redes locales', 'location_id' => 11, 'teacher_id' => 12, 'group_id' => 12, 'day' => 3, 'starts_at' => '13:00:00', 'ends_at' => '14:00:00'],
            ['description' => 'Programación', 'location_id' => 12, 'teacher_id' => 13, 'group_id' => 13, 'day' => 2, 'starts_at' => '08:00:00', 'ends_at' => '09:00:00'],
            ['description' => 'Bases de datos', 'location_id' => 13, 'teacher_id' => 14, 'group_id' => 14, 'day' => 5, 'starts_at' => '09:00:00', 'ends_at' => '10:00:00'],
            ['description' => 'Filosofía', 'location_id' => 14, 'teacher_id' => 15, 'group_id' => 15, 'day' => 1, 'starts_at' => '10:00:00', 'ends_at' => '11:00:00'],
            ['description' => 'Historia del mundo contemporáneo', 'location_id' => 15, 'teacher_id' => 16, 'group_id' => 16, 'day' => 4, 'starts_at' => '11:00:00', 'ends_at' => '12:00:00'],
            ['description' => 'Matemáticas II', 'location_id' => 16, 'teacher_id' => 17, 'group_id' => 17, 'day' => 2, 'starts_at' => '12:00:00', 'ends_at' => '13:00:00'],
            ['description' => 'Economía de la empresa', 'location_id' => 17, 'teacher_id' => 18, 'group_id' => 18, 'day' => 2, 'starts_at' => '13:00:00', 'ends_at' => '14:00:00'],
        ];

        foreach ($lessons as $lesson) {
            DB::table('lessons')->updateOrInsert(
                [
                    'description' => $lesson['description'],
                    'day' => $lesson['day'],
                    'starts_at' => $lesson['starts_at'],
                ],
                array_merge($lesson, ['updated_at' => now(), 'created_at' => now()])
            );
        }
    }
}
