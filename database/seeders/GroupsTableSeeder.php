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
        // Crear 3 registros de ejemplo en la tabla groups
        DB::table('groups')->insert([
            'name' => '3ºA ESO',
            'location' => 'Aula 105',
            'tutor_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('groups')->insert([
            'name' => '2º DAW FPGS',
            'location' => 'Aula 301',
            'tutor_id' => 3, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('groups')->insert([
            'name' => '1ºB Bachillerato',
            'location' => 'Aula 215',
            'tutor_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
