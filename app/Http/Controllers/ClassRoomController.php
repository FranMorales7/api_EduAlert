<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
     /**
     * Mostrar todos las aulas.
     */
    public function index()
    {
        // Generar las relaciones eloquent del modelo
        $classRooms = ClassRoom::all();
        return response()->json($classRooms);
    }

    /**
     * Crear un nuevo aula.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:1000',
        ]);

        $classRoom = ClassRoom::updateOrCreate($validated);

        return response()->json($classRoom, 201);
    }

    /**
     * Muestro un aula en específico.
     */
    public function show(ClassRoom $classRoom)
    {
        return response()->json($classRoom);
    }

    /**
     * Actualizar un dato o varios de un aula.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:1000',
        ]);

        $classRoom->update($validated);

        return response()->json($classRoom);
    }

    /**
     * Eliminar un aula.
     */
    public function destroy(ClassRoom $classRoom)
    {
        $classRoom->delete();

        return response()->json(['message' => 'Aula eliminada correctamente.']);
    }

}
