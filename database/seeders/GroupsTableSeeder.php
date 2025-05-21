<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear registros de ejemplo en la tabla groups
        DB::table('groups')->insert([
        ['name' => '1ºA ESO', 'location' => 'Aula 12', 'tutor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '1ºB ESO', 'location' => 'Aula 23', 'tutor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºA ESO', 'location' => 'Aula 45', 'tutor_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºB ESO', 'location' => 'Aula 60', 'tutor_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '3ºA ESO', 'location' => 'Aula 78', 'tutor_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '3ºB ESO', 'location' => 'Aula 89', 'tutor_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '4ºA ESO', 'location' => 'Aula 101', 'tutor_id' => 7, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '4ºB ESO', 'location' => 'Aula 115', 'tutor_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGB', 'location' => 'Aula 130', 'tutor_id' => 9, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGB', 'location' => 'Aula 145', 'tutor_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGM', 'location' => 'Aula 150', 'tutor_id' => 11, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGM', 'location' => 'Aula 160', 'tutor_id' => 12, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGS', 'location' => 'Aula 170', 'tutor_id' => 13, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGS', 'location' => 'Aula 180', 'tutor_id' => 14, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1ºA Bachillerato', 'location' => 'Aula 190', 'tutor_id' => 15, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '1ºB Bachillerato', 'location' => 'Aula 195', 'tutor_id' => 16, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºA Bachillerato', 'location' => 'Aula 198', 'tutor_id' => 17, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºB Bachillerato', 'location' => 'Aula 200', 'tutor_id' => 18, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
