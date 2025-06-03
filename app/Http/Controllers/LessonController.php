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
        $lessons = Lesson::with(['location', 'teacher', 'group'])->get();
        return response()->json($lessons);
    }

    /**
     * Crear una nueva clase.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:1000',
            'class_room_id' => 'required|exists:class_rooms,id',
            'teacher_id' => 'nullable|exists:teachers,id',
            'group_id' => 'nullable|exists:groups,id',
            'day' => 'nullable | int | max:2',
            'starts_at' => 'required|datetime',
            'ends_at' => 'required|datetime',
        ]);

        $lesson = Lesson::updateOrCreate($validated);

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
            'class_room_id' => 'sometimes|exists:class_rooms,id',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'group_id' => 'sometimes|exists:groups,id',
            'day' => 'sometimes | int | max:2',
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

    // Obtener el horario semanal de un profesor
    public function getSchedule($teacherId)
    {
        // Obtener todas las lecciones del profesor con su grupo relacionado
        $lessons = Lesson::where('teacher_id', $teacherId)
            ->with('group', 'location') // relación group y location en el modelo Lesson
            ->get();

        // Validación por si no hay clases
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'El profesor no tiene clases asignadas.'], 404);
        }

        // Formatear la respuesta
        $resp = $lessons->map(function ($lesson) {
            return [
                'day' => $lesson->day,
                'starts_at' => $lesson->starts_at,
                'ends_at' => $lesson->ends_at,
                'subject' => $lesson->description,
                'location' => optional($lesson->location)->name, // Previene error si no tiene ubicación
                'group' => optional($lesson->group)->name, // Previene error si no tiene grupo
            ];
        });

        return response()->json($resp);
    }

}