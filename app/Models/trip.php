<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['description', 'is_solved', 'student_id', 'teacher_id', 'lesson_id'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = [];

    // Indica relación Eloquent
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function class(){
        return $this->belongsTo(Lesson::class);
    }
}
