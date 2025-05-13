<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea registros de ejemplo para la tabla tutors
        $faker = Faker::create();

        // Obtener 18 IDs únicos entre 1 y 30
        $uniqueTeacherIds = $faker->unique()->randomElements(range(1, 30), 18);

        foreach ($uniqueTeacherIds as $teacherId) {
            DB::table('tutors')->insert([
                'teacher_id' => $teacherId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}