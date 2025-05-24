<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Mostrar todos los grupos.
     */
    public function index()
    {
        // Generar las relaciones eloquent del modelo
        $groups = Group::with(['location' ,'tutor'])->get();
        return response()->json($groups);
    }

    /**
     * Crear un nuevo grupo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:1000',
            'location' => 'required|exists:class_rooms,id',
            'tutor_id' => 'nullable|exists:teachers,id'
        ]);

        $group = Group::create($validated);

        return response()->json($group, 201);
    }

    /**
     * Muestro un grupo en específico.
     */
    public function show(Group $group)
    {
        $group->load(['location', 'tutor']);
        return response()->json($group);
    }

    /**
     * Actualizar un dato o varios de un grupo.
     */
    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:1000',
            'location' => 'sometimes|exists:class_rooms,id',
            'tutor_id' => 'sometimes|exists:teachers,id'
        ]);

        $group->update($validated);

        return response()->json($group);
    }

    /**
     * Eliminar un grupo.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(['message' => 'Grupo eliminado correctamente.']);
    }
}