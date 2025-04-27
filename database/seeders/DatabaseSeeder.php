<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ManagersTableSeeder::class,
            TeachersTableSeeder::class,
            TutorsTableSeeder::class,
            GroupsTableSeeder::class,
            StudentsTableSeeder::class,
            LessonsTableSeeder::class,
            TripsTableSeeder::class,
            IncidentsTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
