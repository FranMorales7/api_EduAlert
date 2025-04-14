<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classes extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['description', 'location', 'teacher_id', 'group_id', 'starts_at', 'ends_at'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];
}
