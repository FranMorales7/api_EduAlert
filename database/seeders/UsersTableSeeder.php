<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea registros de ejemplo en la tabla users
        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'Quevedo@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'role' => null,
        ]);
        DB::table('users')->insert([
            'name' => 'Sonia',
            'email' => 'soniaReverte@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'role' => null,
        ]);
    }
}
