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
            'is_admin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Isabel',
            'email' => 'isabelHerrera@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'is_admin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Rosario',
            'email' => 'rosarioJBlanco@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Gonzalo',
            'email' => 'gonzaloMegias@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Sonia',
            'email' => 'soniaReverte@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'is_admin' => true,
        ]);
    }
}
