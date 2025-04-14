<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class exits extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'is_solved', 'student_id', 'teacher_id', 'class_id'];

    protected $hidden = [];
}
