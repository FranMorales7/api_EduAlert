<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class teachers extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'last_name_1', 'last_name_2', 'image', 'e-mail', 'is_admin', 'is_active'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = ['password'];

    // Como se deben tratar los datos específicado al ser recuperados de la base de datos
    protected function casts(): string
    {
        return [
            'password' => 'hashed',
        ];
    }
}
