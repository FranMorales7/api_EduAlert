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
            ['name' => '1ºA ESO', 'class_room_id' => 1, 'tutor_id' => 1],
            ['name' => '1ºB ESO', 'class_room_id' => 2, 'tutor_id' => 2],
            ['name' => '2ºA ESO', 'class_room_id' => 3, 'tutor_id' => 3],
            ['name' => '2ºB ESO', 'class_room_id' => 4, 'tutor_id' => 4],
            ['name' => '3ºA ESO', 'class_room_id' => 5, 'tutor_id' => 5],
            ['name' => '3ºB ESO', 'class_room_id' => 6, 'tutor_id' => 6],
            ['name' => '4ºA ESO', 'class_room_id' => 7, 'tutor_id' => 7],
            ['name' => '4ºB ESO', 'class_room_id' => 8, 'tutor_id' => 8],
            ['name' => '1º FPGB', 'class_room_id' => 9, 'tutor_id' => 9],
            ['name' => '2º FPGB', 'class_room_id' => 10, 'tutor_id' => 10],
            ['name' => '1º FPGM', 'class_room_id' => 11, 'tutor_id' => 11],
            ['name' => '2º FPGM', 'class_room_id' => 12, 'tutor_id' => 12],
            ['name' => '1º FPGS', 'class_room_id' => 13, 'tutor_id' => 13],
            ['name' => '2º FPGS', 'class_room_id' => 14, 'tutor_id' => 14],
            ['name' => '1ºA Bachillerato', 'class_room_id' => 15, 'tutor_id' => 15],
            ['name' => '1ºB Bachillerato', 'class_room_id' => 16, 'tutor_id' => 16],
            ['name' => '2ºA Bachillerato', 'class_room_id' => 17, 'tutor_id' => 17],
            ['name' => '2ºB Bachillerato', 'class_room_id' => 18, 'tutor_id' => 18],
        ];

        foreach ($groups as $group) {
            DB::table('groups')->updateOrInsert(
                ['name' => $group['name']], // clave única
                [
                    'class_room_id' => $group['class_room_id'],
                    'tutor_id' => $group['tutor_id'],
                    'updated_at' => $now,
                    'created_at' => $now
                ]
            );
        }
    }
}
