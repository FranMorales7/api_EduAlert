<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Estas credenciales no coinciden con nuestros registros.'],
            ]);
        }

        // Generamos el token del usuario
        $token = $user->createToken('EduAlert')->plainTextToken;

        // Devolvemos la info
        return response()->json([
            'message' => 'Login correcto',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
