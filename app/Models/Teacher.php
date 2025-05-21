<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['user_id', 'name', 'last_name_1', 'last_name_2', 'image', 'email', 'password', 'is_admin', 'is_active'];

    // Campos que no se mostrarán en los resultados
    protected $hidden = ['password'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
