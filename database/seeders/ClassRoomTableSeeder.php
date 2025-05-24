<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear registros de ejemplo en la tabla groups
        DB::table('class_rooms')->insert([
        ['name' => 'Aula 12', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 23', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 45', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 60', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 78', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 89', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 101', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 115', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 130', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 145', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 150', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 160', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 170', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 180', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 190', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 195', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 198', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Aula 200', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
