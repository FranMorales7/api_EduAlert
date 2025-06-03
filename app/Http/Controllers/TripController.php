<?php

namespace App\Http\Controllers;

use App\Events\NewNotificationCreated;
use App\Models\Trip;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Mostrar todas las salidas al baño.
     */
    public function index()
    {
        // Generar las relaciones eloquent del modelo, incluso la relacion interna de lesson con location
        $trips = Trip::with(['student', 'teacher', 'lesson.location'])->orderBy('created_at', 'desc')->get();

        return response()->json($trips);
    }

    /**
     * Crear una nueva salida al baño.
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

        $trip = Trip::create($validated);

        // Datos para la notificación
        $notificationData = [
            'title' => 'Nueva salida',
            'message' => $trip->description,
            'created_at' => now()->toDateString(),
        ];

        // Emitir el evento para notificación en tiempo real
        event(new NewNotificationCreated($notificationData));

        return response()->json($trip, 201);
    }

    /**
     * Mostrar una salida al baño en específico.
     */
    public function show(Trip $trip)
    {
         try {
            // Obtiene las relaciones
            $lesson = $trip->lesson;
            $student = $trip->student;
            $email = $trip->teacher->email;
            $teacher = Teacher::where('email', $email)->first();

            // Si alguna de las relaciones no existe, devolver 'null'
            return response()->json([
                'trip' => $trip,
                'lesson' => $lesson ? $lesson : null,
                'student' => $student ? $student : null,
                'teacher' => $teacher ? $teacher : null,
            ]);
        } catch (\Exception $e) {
            // Maneja cualquier error que pueda ocurrir durante el proceso
            return response()->json([
                'message' => 'Error al obtener la salida: ' . $e->getMessage()
            ], 500);  // Devuelve un error 500 si ocurre una excepción
        }
    }

    /**
     * Actualizar un dato o varios de una salida.
     */
    public function update(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'description' => 'sometimes|string|max:10000',
            'is_solved' => 'boolean',
            'student_id' => 'sometimes|exists:students,id',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'lesson_id' => 'sometimes|exists:lessons,id',
        ]);

        $trip->update($validated);

        return response()->json($trip);
    }

    /**
     * Eliminar una salida al baño.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return response()->json(['message' => 'Salida al aseo eliminada correctamente.']);
    }

    /**
     * Buscar una salida en clase según el profesor.
     */
    public function filterByUser($user)
    {
        $response = Trip::with(['student', 'lesson.location'])
        ->where('teacher_id', $user)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($response);
    }

    /**
     * Eliminar aquellas incidencias que estén marcadas como "resueltas"
     */
    public function deleteSolvedTrips()
    {
        $count = Trip::where('is_solved', true)->delete();

        return response()->json([
            'message' => "$count salidas resueltas eliminadas"
        ]);
    }
}
