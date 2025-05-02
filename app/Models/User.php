<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // Necesario para que funcione Sanctum

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
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
}
