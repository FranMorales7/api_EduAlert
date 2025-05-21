<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    /**
     * Mostrar todo el equipo directivo.
     */
    public function index()
    {
        return Manager::with('user')->get();
    }

    /**
     * Crear un nuevo directivo desde User.
     */
    // public function store(Request $request){}

    /**
     * Mostrar un miembro del equipo directivo en específico.
     */
    public function show(Manager $manager)
    {
        return response()->json($manager);
    }

    /**
     * Actualizar los datos de un miembro del equipo directivo.
     */
    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $manager = Manager::where('user_id', $userId)->first();
        if (!$manager) {
            return response()->json(['error' => 'Directivo no encontrado'], 404);
        }
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'sometimes|email|unique:managers,email,' . $manager->id,
            'password' => 'sometimes|min:8',
        ]);

        // Si se modifica la contraseña, ésta se encriptará
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Manejar imagen
        if ($request->hasFile('image')) {
            if ($manager->image) {
                Storage::disk('public')->delete($manager->image);
            }

            $path = $request->file('image')->store('managers', 'public');
            $validated['image'] = $path;
        }

        $manager->update($validated);

        return response()->json($manager);
    }

    /**
     * Eliminar un miembro del equipo directivo.
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        return response()->json(['message' => 'Miembro del equipo directivo elimiando correctamente.']);
    }

    /**
     * Mostrar un miembro del equipo directivo en específico filtrando por id_usuario.
     */
    public function filterByUserId($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $manager = Manager::where('user_id', $userId)->first();

        if (!$manager) {
            return response()->json(['error' => 'Directivo no encontrado'], 404);
        }

        return response()->json($manager);
    }

}
