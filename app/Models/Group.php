<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'location', 'tutor_id'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

    // Indica relación Eloquent
    public function tutor(){
        return $this->belongsTo(Teacher::class);
    }
}
