<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['description', 'class_room_id', 'teacher_id', 'group_id', 'day', 'starts_at', 'ends_at'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

    // Indica relación Eloquent
    public function location(){
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

     //Convertir los datos pasados al tipo necesario
     protected $casts = ['starts_at' => 'datetime', 'ends_at' => 'datetime'];

}
