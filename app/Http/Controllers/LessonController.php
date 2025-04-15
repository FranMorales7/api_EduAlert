<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Mostrar todas las clases.
     */
    public function index()
    {
        return response()->json(Lesson::all());
    }

    /**
     * Crear una nueva clase.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:1000',
            'teacher_id' => 'nullable|exists:teachers,id',
            'group_id' => 'nullable|exists:groups,id',
            'starts_at' => 'required|datetime',
            'ends_at' => 'required|datetime',
        ]);

        $lesson = Lesson::create($validated);

        return response()->json($lesson, 201);
    }

    /**
     * Mostrar una clase en específico.
     */
    public function show(Lesson $lesson)
    {
        return response()->json($lesson);
    }

    /**
     * Actualizar los datos de una clase.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'description' => 'sometimes|string|max:1000',
            'location' => 'sometimes|string|max:1000',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'group_id' => 'sometimes|exists:groups,id',
            'starts_at' => 'sometimes|datetime',
            'ends_at' => 'sometimes|datetime',
        ]);

        $lesson->update($validated);

        return response()->json($lesson);
    }

    /**
     * Eliminar una clase.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json(['message' => 'Clase eliminada correctamente.']);
    }
}
