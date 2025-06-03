<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'class_room_id', 'tutor_id'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

    // Indica relación Eloquent
    public function location(){
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    
    public function tutor(){
        return $this->belongsTo(Teacher::class, 'tutor_id');
    }
}
