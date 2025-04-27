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

        // Aplicamos el rol del usuario
        $this->setRole($user);

        // Generamos el token del usuario
        $token = $user->createToken('EduAlert')->plainTextToken;

        // Devolvemos la info
        return response()->json([
            'message' => 'Login correcto',
            'token' => $token,
            'user' => $user,
        ]);
    }

    private function setRole(User $user)
    {
        // Buscamos en Teacher
        $teacher = Teacher::where('email', $user->email)->first();
        
        if ($teacher) {
            $user->role = 'teacher';
            return;
        }

        // Buscamos en Manager
        $manager = Manager::where('email', $user->email)->first();
        
        if ($manager) {
            $user->role = 'manager';
            return;
        }

    }
}
