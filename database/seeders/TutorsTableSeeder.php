<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 3 registros
        DB::table('tutors')->insert([
            'teacher_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tutors')->insert([
            'teacher_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tutors')->insert([
            'teacher_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}