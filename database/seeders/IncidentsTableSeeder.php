<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncidentsTableSeeder extends Seeder
{
    public function run()
    {
        $incidents = [
            [
                'description' => 'El estudiante ha lanzado un avión de papel a la mesa del profesor, por lo que ha sido reprendido y amonestado con un parte disciplinario.',
                'is_solved' => true,
                'student_id' => 2,
                'teacher_id' => 4,
                'lesson_id' => 2,
                'created_at' => '2025-04-14 12:05:48',
                'updated_at' => '2025-04-16 12:10:08',
            ],
            [
                'description' => 'El estudiante ha salido del aula alegando que se estaba aburriendo en clase',
                'is_solved' => false,
                'student_id' => 8,
                'teacher_id' => 1,
                'lesson_id' => 3,
                'created_at' => '2025-05-12 10:15:01',
                'updated_at' => now(),
            ],
            [
                'description' => 'El estudiante ha estado utilizando el móvil durante el examen a pesar de varias advertencias.',
                'is_solved' => true,
                'student_id' => 3,
                'teacher_id' => 2,
                'lesson_id' => 1,
                'created_at' => '2025-04-22 09:30:00',
                'updated_at' => '2025-04-23 08:00:00',
            ],
            [
                'description' => 'Se detectó que el estudiante estaba copiando tareas de otro compañero.',
                'is_solved' => false,
                'student_id' => 6,
                'teacher_id' => 3,
                'lesson_id' => 2,
                'created_at' => '2025-05-02 13:45:00',
                'updated_at' => now(),
            ],
            [
                'description' => 'El alumno se negó a participar en una actividad grupal de forma reiterada.',
                'is_solved' => true,
                'student_id' => 5,
                'teacher_id' => 2,
                'lesson_id' => 1,
                'created_at' => '2025-03-29 11:20:00',
                'updated_at' => '2025-04-01 15:00:00',
            ],
            [
                'description' => 'El estudiante ha insultado a otro compañero en clase de forma verbal.',
                'is_solved' => false,
                'student_id' => 4,
                'teacher_id' => 1,
                'lesson_id' => 3,
                'created_at' => '2025-04-30 10:10:00',
                'updated_at' => now(),
            ],
            [
                'description' => 'El estudiante interrumpía constantemente la clase con comentarios inapropiados.',
                'is_solved' => true,
                'student_id' => 7,
                'teacher_id' => 3,
                'lesson_id' => 2,
                'created_at' => '2025-04-18 14:00:00',
                'updated_at' => '2025-04-20 09:15:00',
            ],
            [
                'description' => 'El estudiante no trajo el material necesario durante tres días consecutivos.',
                'is_solved' => false,
                'student_id' => 1,
                'teacher_id' => 4,
                'lesson_id' => 3,
                'created_at' => '2025-05-01 08:50:00',
                'updated_at' => now(),
            ],
            [
                'description' => 'El estudiante fue sorprendido comiendo en clase sin permiso.',
                'is_solved' => true,
                'student_id' => 8,
                'teacher_id' => 2,
                'lesson_id' => 2,
                'created_at' => '2025-04-15 11:10:00',
                'updated_at' => '2025-04-15 13:25:00',
            ],
            [
                'description' => 'El estudiante ha escrito grafitis en su pupitre durante la clase.',
                'is_solved' => false,
                'student_id' => 2,
                'teacher_id' => 1,
                'lesson_id' => 1,
                'created_at' => '2025-05-06 09:00:00',
                'updated_at' => now(),
            ],
        ];

        foreach ($incidents as $incident) {
            DB::table('incidents')->updateOrInsert(
                [
                    'description' => $incident['description'], // clave identificadora
                ],
                $incident
            );
        }
    }
}
