<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $groups = [
            ['name' => '1ºA ESO', 'location_id' => 1, 'tutor_id' => 1],
            ['name' => '1ºB ESO', 'location_id' => 2, 'tutor_id' => 2],
            ['name' => '2ºA ESO', 'location_id' => 3, 'tutor_id' => 3],
            ['name' => '2ºB ESO', 'location_id' => 4, 'tutor_id' => 4],
            ['name' => '3ºA ESO', 'location_id' => 5, 'tutor_id' => 5],
            ['name' => '3ºB ESO', 'location_id' => 6, 'tutor_id' => 6],
            ['name' => '4ºA ESO', 'location_id' => 7, 'tutor_id' => 7],
            ['name' => '4ºB ESO', 'location_id' => 8, 'tutor_id' => 8],
            ['name' => '1º FPGB', 'location_id' => 9, 'tutor_id' => 9],
            ['name' => '2º FPGB', 'location_id' => 10, 'tutor_id' => 10],
            ['name' => '1º FPGM', 'location_id' => 11, 'tutor_id' => 11],
            ['name' => '2º FPGM', 'location_id' => 12, 'tutor_id' => 12],
            ['name' => '1º FPGS', 'location_id' => 13, 'tutor_id' => 13],
            ['name' => '2º FPGS', 'location_id' => 14, 'tutor_id' => 14],
            ['name' => '1ºA Bachillerato', 'location_id' => 15, 'tutor_id' => 15],
            ['name' => '1ºB Bachillerato', 'location_id' => 16, 'tutor_id' => 16],
            ['name' => '2ºA Bachillerato', 'location_id' => 17, 'tutor_id' => 17],
            ['name' => '2ºB Bachillerato', 'location_id' => 18, 'tutor_id' => 18],
        ];

        foreach ($groups as $group) {
            DB::table('groups')->updateOrInsert(
                ['name' => $group['name']], // clave única
                [
                    'location_id' => $group['location_id'],
                    'tutor_id' => $group['tutor_id'],
                    'updated_at' => $now,
                    'created_at' => $now
                ]
            );
        }
    }
}
