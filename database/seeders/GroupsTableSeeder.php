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
        ['name' => '1ºA ESO', 'location_id' => 1, 'tutor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '1ºB ESO', 'location_id' => 2, 'tutor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºA ESO', 'location_id' => 3, 'tutor_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºB ESO', 'location_id' => 4, 'tutor_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '3ºA ESO', 'location_id' => 5, 'tutor_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '3ºB ESO', 'location_id' => 6, 'tutor_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '4ºA ESO', 'location_id' => 7, 'tutor_id' => 7, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '4ºB ESO', 'location_id' => 8, 'tutor_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGB', 'location_id' => 9, 'tutor_id' => 9, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGB', 'location_id' => 10, 'tutor_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGM', 'location_id' => 11, 'tutor_id' => 11, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGM', 'location_id' => 12, 'tutor_id' => 12, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1º FPGS', 'location_id' => 13, 'tutor_id' => 13, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2º FPGS', 'location_id' => 14, 'tutor_id' => 14, 'created_at' => now(), 'updated_at' => now()],
        
        ['name' => '1ºA Bachillerato', 'location_id' => 15, 'tutor_id' => 15, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '1ºB Bachillerato', 'location_id' => 16, 'tutor_id' => 16, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºA Bachillerato', 'location_id' => 17, 'tutor_id' => 17, 'created_at' => now(), 'updated_at' => now()],
        ['name' => '2ºB Bachillerato', 'location_id' => 18, 'tutor_id' => 18, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
