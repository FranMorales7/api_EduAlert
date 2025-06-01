<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassRoomTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $classrooms = [
            'Aula 12', 'Aula 23', 'Aula 45', 'Aula 60', 'Aula 78',
            'Aula 89', 'Aula 101', 'Aula 115', 'Aula 130', 'Aula 145',
            'Aula 150', 'Aula 160', 'Aula 170', 'Aula 180', 'Aula 190',
            'Aula 195', 'Aula 198', 'Aula 200',
        ];

        foreach ($classrooms as $name) {
            DB::table('class_rooms')->updateOrInsert(
                ['name' => $name], // Clave de búsqueda
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }
}
