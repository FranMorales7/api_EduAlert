<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // Necesario para que funcione Sanctum

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'last_name_1',
        'last_name_2',
        'image',
        'email',
        'password',
        'is_admin',
        'is_active',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

        public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

}
