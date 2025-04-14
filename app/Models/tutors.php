<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tutors extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['teacher_id'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

}
