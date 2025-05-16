<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Mostrar todos los profesores.
     */
    public function index()
    {
        return response()->json(Teacher::all());
    }

    /**
     * Crear un nuevo profesor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name_1' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|min:8',
        ]);

        // Encriptar la contraseña
        $validated['password'] = Hash::make($validated['password']);

        $teacher = Teacher::create($validated);

        return response()->json($teacher, 201);
    }

    /**
     * Mostrar un profesor en específico.
     */
    public function show(Teacher $teacher)
    {
        return response()->json($teacher);
    }

    /**
     * Actualizar los datos de un profesor.
     */
    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $teacher = Teacher::where('email', $user->email)->first();

        if (!$teacher) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'image' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:teachers,email,' . $teacher->id,
            'password' => 'sometimes|min:8',
        ]);

        // Si se modifica la contraseña, ésta se encriptará
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $teacher->update($validated);

        return response()->json($teacher);
    }

    /**
     * Eliminar un profesor.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json(['message' => 'Profesor elimiando correctamente.']);
    }

    public function setUser(Teacher $teacher) 
    {
        if (!User::where('email', $teacher->email)->exists()) {
            User::create([
                'name' => $teacher->name,
                'email' => $teacher->email,
                'password' => bcrypt($teacher->password),
                'is_admin' => false,
                'is_active' => true,
            ]);
        }
    }

    /**
     * Mostrar un profesor en específico filtrando por id_usuario.
     */
    public function filterByUserId($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $teacher = Teacher::where('email', $user->email)->first();

        if (!$teacher) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        return response()->json($teacher);
    }

}
