<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Mostrar todos los tutores.
     */
    public function index()
    {
        return response()->json(Tutor::with('teacher')->get());
    }

    /**
     * Crear un nuevo tutor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id'
        ]);

        $tutor = Tutor::create($validated);

        return response()->json($tutor, 201);
    }

    /**
     * Mostrar un tutor en específico.
     */
    public function show(Tutor $tutor)
    {
        return response()->json($tutor);
    }

    /**
     * Actualizar un dato o varios de un tutor.
     */
    public function update(Request $request, Tutor $tutor)
    {
        $validated =  $request->validate([
            'teacher_id' => 'sometimes|exists:teacher,id'
        ]);

        $tutor->update($validated);

        return response()->json($tutor);
    }

    /**
     * Eliminar un tutor.
     */
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();

        return response()->json(['message' => 'Tutor eliminado correctamente.']);
    }
}
