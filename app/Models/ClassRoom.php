<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = ['name'];
}
