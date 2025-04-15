<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'last_name_1', 'last_name_2', 'image', 'e-mail', 'password', 'is_admin', 'is_active'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = ['password'];

}
