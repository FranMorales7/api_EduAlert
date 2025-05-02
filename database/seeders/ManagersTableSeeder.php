<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 5 registros de ejemplo en la tabla managementteams
        DB::table('managers')->insert([
            'name' => 'Rosario',
            'last_name_1' => 'Jiménez',
            'last_name_2' => 'Blanco',
            'image' => null,
            'email' => 'rosarioJBlanco@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('managers')->insert([
            'name' => 'Gonzalo',
            'last_name_1' => 'Megías',
            'last_name_2' => 'Calvo',
            'image' => null,
            'email' => 'gonzaloMegias@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('managers')->insert([
            'name' => 'Sonia',
            'last_name_1' => 'Reverte',
            'last_name_2' => 'Fortea',
            'image' => null,
            'email' => 'soniaReverte@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
