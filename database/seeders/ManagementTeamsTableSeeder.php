<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 5 registros de ejemplo en la tabla managementteams
        DB::table('management_teams')->insert([
            'name' => 'Rosario',
            'last_name_1' => 'Jiménez',
            'last_name_2' => 'Blanco',
            'image' => null,
            'e-mail' => 'rosarioJBlanco@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a ...
            // 'is_admin' => true, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('management_teams')->insert([
            'name' => 'Gonzalo',
            'last_name_1' => 'Megías',
            'last_name_2' => 'Calvo',
            'image' => null,
            'e-mail' => 'gonzaloMegias@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a ...
            // 'is_admin' => true, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('management_teams')->insert([
            'name' => 'Dolores',
            'last_name_1' => 'Cifuentes',
            'last_name_2' => 'Rodríguez',
            'image' => null,
            'e-mail' => 'doloresCifuentes@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a ...
            // 'is_admin' => true, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('management_teams')->insert([
            'name' => 'Juan Pablo',
            'last_name_1' => 'Gómez',
            'last_name_2' => 'Neva',
            'image' => null,
            'e-mail' => 'juanGomez@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a ...
            // 'is_admin' => true, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('management_teams')->insert([
            'name' => 'Sonia',
            'last_name_1' => 'Reverte',
            'last_name_2' => 'Fortea',
            'image' => null,
            'e-mail' => 'soniaReverte@email.com',
            'password' => bcrypt('12345678'), // Contraseña cifrada
            // Por defecto están a ...
            // 'is_admin' => true, 
            // 'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
