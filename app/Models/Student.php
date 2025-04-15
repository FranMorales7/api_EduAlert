<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'last_name_1', 'last_name_2', 'birthdate', 'image', 'contact', 'group_id'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

    //Convertir los datos pasados al tipo necesario
    protected $casts = ['birthdate' => 'date'];

    // Indica relación Eloquent
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
