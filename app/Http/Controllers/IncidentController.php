<?php

namespace App\Http\Controllers;

use App\Events\NewNotificationCreated;
use App\Models\Incident;
use App\Models\Teacher;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Mostrar todos los incidentes en clase.
     */
    public function index()
    {
        // Generar las relaciones eloquent del modelo e incluso la relacion interna de lesso con location
        $incidents = Incident::with(['student', 'teacher', 'lesson.location'])->orderBy('created_at', 'desc')->get();

        return response()->json($incidents);
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

        // Cargar la lección y su ubicación si existe
        $incident->load('lesson.location');

        $locationName = $incident->lesson->location->name ?? 'Ubicación desconocida';

        // Datos para la notificación
        $notificationData = [
            'title' => 'Nueva incidencia',
            'message' => "{$incident->description} (en {$locationName})",
            'created_at' => now()->toDateString(),
        ];

        // Emitir el evento para notificación en tiempo real
        event(new NewNotificationCreated($notificationData));
        return response()->json($incident, 201);
    }

    /**
     * Mostrar un incidente en clase en específico.
     */
    public function show(Incident $incident)
    {
        try {
            // Obtiene las relaciones
            $lesson = $incident->lesson;
            $student = $incident->student;
            $email = $incident->teacher->email;
            $teacher = Teacher::where('email', $email)->first();

            // Si alguna de las relaciones no existe, devolver 'null'
            return response()->json([
                'incident' => $incident,
                'lesson' => $lesson ? $lesson : null,
                'student' => $student ? $student : null,
                'teacher' => $teacher ? $teacher : null,
            ]);
        } catch (\Exception $e) {
            // Maneja cualquier error que pueda ocurrir durante el proceso
            return response()->json([
                'message' => 'Error al obtener el incidente: ' . $e->getMessage()
            ], 500);  // Devuelve un error 500 si ocurre una excepción
        }
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

    /**
     * Buscar un incidente en clase según el profesor.
     */
    public function filterByUser($user)
    {
        $response = Incident::with(['student', 'lesson.location'])
        ->where('teacher_id', $user)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($response);
    }

    /**
     * Eliminar aquellas incidencias que estén marcadas como "resueltas"
     */
    public function deleteSolvedIncidents()
    {
        $count = Incident::where('is_solved', true)->delete();

        return response()->json([
            'message' => "$count incidencias resueltas eliminadas"
        ]);
    }
}