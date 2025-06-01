<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Profesores específicos
        $specificTeachers = [
            ['name' => 'Isabel', 'last_name_1' => 'Herrera', 'last_name_2' => 'Nuñez', 'email' => 'isabelHerrera@email.com'],
            ['name' => 'Pedro', 'last_name_1' => 'Quevedo', 'last_name_2' => 'Linton', 'email' => 'Quevedo@email.com'],
        ];

        foreach ($specificTeachers as $data) {
            $user = User::updateOrCreate([
                'name' => $data['name'],
                'last_name_1' => $data['last_name_1'],
                'last_name_2' => $data['last_name_2'],
                'image' => null,
                'email' => $data['email'],
                'password' => Hash::make('12345678'),
                'is_admin' => false,
                'is_active' => true,
            ]);

            Teacher::updateOrCreate([
                'user_id' => $user->id,
                'name' => $data['name'],
                'last_name_1' => $data['last_name_1'],
                'last_name_2' => $data['last_name_2'],
                'email' => $data['email'],
                'password' => $user->password,
                'image' => null,
                'is_admin' => false,
                'is_active' => true,
            ]);
        }

        // Profesores aleatorios
        for ($i = 0; $i < 28; $i++) {
            $name = $faker->firstName;
            $last_name_1 = $faker->lastName;
            $last_name_2 = $faker->optional()->lastName;
            $email = $faker->unique()->safeEmail;

            $user = User::updateOrCreate([
                'name' => $name,
                'last_name_1' => $last_name_1,
                'last_name_2' => $last_name_2,
                'image' => null,
                'email' => $email,
                'password' => Hash::make('12345678'),
                'is_admin' => false,
                'is_active' => true,
            ]);

            Teacher::updateOrCreate([
                'user_id' => $user->id,
                'name' => $name,
                'last_name_1' => $last_name_1,
                'last_name_2' => $last_name_2,
                'email' => $email,
                'password' => $user->password,
                'image' => null,
                'is_admin' => false,
                'is_active' => true,
            ]);
        }
    }
}