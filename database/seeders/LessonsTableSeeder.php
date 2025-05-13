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
        ['description' => 'Lengua castellana y literatura', 'location' => 'Aula 12', 'teacher_id' => 1, 'group_id' => 1, 'day' => 2 ,'starts_at' => '08:00:00', 'ends_at' => '09:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Matemáticas', 'location' => 'Aula 23', 'teacher_id' => 2, 'group_id' => 2, 'day' => 5 ,'starts_at' => '08:00:00', 'ends_at' => '09:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Biología', 'location' => 'Aula 45', 'teacher_id' => 3, 'group_id' => 3, 'day' => 3 ,'starts_at' => '09:00:00', 'ends_at' => '10:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Geografía e historia', 'location' => 'Aula 60', 'teacher_id' => 4, 'group_id' => 4, 'day' => 3 ,'starts_at' => '09:00:00', 'ends_at' => '10:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Educación Física', 'location' => 'Gimnasio', 'teacher_id' => 5, 'group_id' => 5, 'day' => 1 ,'starts_at' => '10:00:00', 'ends_at' => '11:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Física y Química', 'location' => 'Aula 89', 'teacher_id' => 6, 'group_id' => 6, 'day' => 5 ,'starts_at' => '10:00:00', 'ends_at' => '11:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Tecnología', 'location' => 'Taller A12', 'teacher_id' => 7, 'group_id' => 7, 'day' => 1 ,'starts_at' => '11:00:00', 'ends_at' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Música', 'location' => 'Aula 115', 'teacher_id' => 8, 'group_id' => 8, 'day' => 2 ,'starts_at' => '11:00:00', 'ends_at' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
        
        ['description' => 'Formación y orientación laboral', 'location' => 'Aula 130', 'teacher_id' => 9, 'group_id' => 9, 'day' => 4 ,'starts_at' => '12:00:00', 'ends_at' => '13:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Ciencias Aplicadas', 'location' => 'Aula 145', 'teacher_id' => 10, 'group_id' => 10,'day' => 4 , 'starts_at' => '12:00:00', 'ends_at' => '13:00:00', 'created_at' => now(), 'updated_at' => now()],
        
        ['description' => 'Sistemas microinformáticos', 'location' => 'Aula 150', 'teacher_id' => 11, 'group_id' => 11,'day' => 1 , 'starts_at' => '13:00:00', 'ends_at' => '14:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Redes locales', 'location' => 'Aula 160', 'teacher_id' => 12, 'group_id' => 12,'day' => 3 , 'starts_at' => '13:00:00', 'ends_at' => '14:00:00', 'created_at' => now(), 'updated_at' => now()],
        
        ['description' => 'Programación', 'location' => 'Aula 170', 'teacher_id' => 13, 'group_id' => 13,'day' => 2 , 'starts_at' => '08:00:00', 'ends_at' => '09:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Bases de datos', 'location' => 'Aula 180', 'teacher_id' => 14, 'group_id' => 14,'day' => 5 , 'starts_at' => '09:00:00', 'ends_at' => '10:00:00', 'created_at' => now(), 'updated_at' => now()],
        
        ['description' => 'Filosofía', 'location' => 'Aula 190', 'teacher_id' => 15, 'group_id' => 15,'day' => 1 , 'starts_at' => '10:00:00', 'ends_at' => '11:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Historia del mundo contemporáneo', 'location' => 'Aula 195', 'teacher_id' => 16, 'group_id' => 16,'day' => 4 , 'starts_at' => '11:00:00', 'ends_at' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Matemáticas II', 'location' => 'Aula 198', 'teacher_id' => 17, 'group_id' => 17,'day' => 2 , 'starts_at' => '12:00:00', 'ends_at' => '13:00:00', 'created_at' => now(), 'updated_at' => now()],
        ['description' => 'Economía de la empresa', 'location' => 'Aula 200', 'teacher_id' => 18, 'group_id' => 18,'day' => 2 , 'starts_at' => '13:00:00', 'ends_at' => '14:00:00', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
