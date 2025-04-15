<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Mostrar todos los incidentes en clase.
     */
    public function index()
    {
        return response()->json(Incident::all());
    }

    /**
     * Crear un nuevo incidente en clase.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:10000',
            'is_solved' => 'boolean',
            'student_id' => 'nullable|exists:students,id',
            'teacher_id' => 'nullable|exists:teachers,id',
            'lesson_id' => 'nullable|exists:lessons,id',
        ]);

        $incident = Incident::create($validated);

        return response()->json($incident, 201);
    }

    /**
     * Mostrar un incidente en clase en específico.
     */
    public function show(Incident $incident)
    {
        return response()->json($incident);
    }

    /**
     * Actualizar un dato o varios de un incidente.
     */
    public function update(Request $request, Incident $incident)
    {
        $validated = $request->validate([
            'description' => 'sometimes|string|max:10000',
            'is_solved' => 'boolean',
            'student_id' => 'sometimes|exists:students,id',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'lesson_id' => 'sometimes|exists:lessons,id',
        ]);

        $incident->update($validated);

        return response()->json($incident);
    }

    /**
     * Eliminar un incidente en clase.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();

        return response()->json(['message' => 'Incidente en el aula eliminado correctamente.']);
    }
}
