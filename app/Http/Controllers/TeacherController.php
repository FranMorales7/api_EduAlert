<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Mostrar todos los profesores.
     */
    public function index()
    {
        return Teacher::with('user')->get();
    }

    /**
     * Crear un nuevo profesor desde User.
     */
    // public function store(Request $request){}

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

        $teacher = Teacher::where('user_id', $userId)->first();

        if (!$teacher) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'sometimes|email|unique:teachers,email,' . $teacher->id,
            'password' => 'sometimes|min:8',
        ]);

        // Si se modifica la contraseña, ésta se encriptará
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Manejar imagen
        if ($request->hasFile('image')) {
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }

            $path = $request->file('image')->store('teachers', 'public');
            $validated['image'] = $path;
        }

        // Actualizar campos sincronizados en User
        if (isset($validated['name'])) {
            $user->name = $validated['name'];
        }

        if (isset($validated['last_name_1'])) {
            $user->last_name_1 = $validated['last_name_1'];
        }

        if (isset($validated['last_name_2'])) {
            $user->last_name_2 = $validated['last_name_2'];
        }

        if (isset($validated['image'])) {
            $user->image = $validated['image'];
        }

        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }

        $user->save();

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

    /**
     * Mostrar un profesor en específico filtrando por id_usuario.
     */
    public function filterByUserId($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $teacher = Teacher::where('user_id', $userId)->first();

        if (!$teacher) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        return response()->json($teacher);
    }

}
