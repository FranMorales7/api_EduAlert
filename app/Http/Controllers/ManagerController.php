<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ManagerController extends Controller
{
    /**
     * Mostrar todo el equipo directivo.
     */
    public function index()
    {
        return response()->json(Manager::all());
    }

    /**
     * Crear un nuevo directivo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name_1' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'email' => 'required|email|unique:managers',
            'password' => 'required|min:8',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Encriptar la contraseña
        $validated['password'] = Hash::make($validated['password']);

        $manager = Manager::create($validated);

        return response()->json($manager, 201);
    }

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
    public function update(Request $request, Manager $manager)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'image' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:managers,email,' . $manager->id,
            'password' => 'sometimes|min:8',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Si se modifica la contraseña, ésta se encriptará
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $manager->update($validated);

        return response()->json($manager);
    }

    /**
     * Eliminar un miembro del equipo directivo.
     */
    public function destroy(string $id)
    {
        $manager->delete();

        return response()->json(['message' => 'Miembro del equipo directivo elimiando correctamente.']);
    }
}
