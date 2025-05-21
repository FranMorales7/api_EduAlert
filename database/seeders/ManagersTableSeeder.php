<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;

class ManagersTableSeeder extends Seeder
{
    public function run()
    {
        // Directivos
        $managers = [
            ['name' => 'Rosario', 'last_name_1' => 'Jiménez', 'last_name_2' => 'Blanco', 'email' => 'rosarioJBlanco@email.com'],
            ['name' => 'Gonzalo', 'last_name_1' => 'Megías', 'last_name_2' => 'Calvo', 'email' => 'gonzaloMegias@email.com'],
            ['name' => 'Sonia', 'last_name_1' => 'Reverte', 'last_name_2' => 'Fortea', 'email' => 'soniaReverte@email.com'],
        ];

        foreach ($managers as $data) {
            $user = User::create([
                'name' => $data['name'],
                'last_name_1' => $data['last_name_1'],
                'last_name_2' => $data['last_name_2'],
                'image' => null,
                'email' => $data['email'],
                'password' => Hash::make('12345678'),
                'is_admin' => true,
                'is_active' => true,
            ]);

            Manager::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'last_name_1' => $data['last_name_1'],
                'last_name_2' => $data['last_name_2'],
                'email' => $data['email'],
                'password' => $user->password,
                'image' => null,
                'is_admin' => true,
                'is_active' => true,
            ]);
        }
    }
}