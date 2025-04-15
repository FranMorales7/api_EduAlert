<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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
        $validated = $request->validated([
            'name' => 'required|string|max:255',
            'last_name_1' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'e-mail' => 'required|email|unique:teachers',
            'password' => 'required|min:8',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
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
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validated([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'image' => 'sometimes|string|max:255',
            'e-mail' => 'sometimes|email|unique:teachers,email,' . $teacher->id,
            'password' => 'sometimes|min:8',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
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
    public function destroy(string $id)
    {
        $teacher->delete();

        return response()->json(['message' => 'Profesor elimiando correctamente.']);
    }
}
