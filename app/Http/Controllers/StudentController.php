<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Mostrar todos los estudiantes.
     */
    public function index()
    {
        return response()->json(Student::all());
    }

    /**
     * Crear un nuevo estudiante.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name_1' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $student = Student::create($validated);

        return response()->json($student, 201);
    }

    /**
     * Mostrar un estudiante en específico.
     */
    public function show(Student $student)
    {
        return response()->json($student);
    }

    /**
     * Actualizar un dato o varios de un estudiante.
     */
    public function update(Request $request, Student $student)
    {
        $validated =  $request->validate([
            'name' => 'sometimes|string|max:255',
            'last_name_1' => 'sometimes|string|max:255',
            'last_name_2' => 'sometimes|string|max:255',
            'birthdate' => 'sometimes|date',
            'image' => 'sometimes|string|max:255',
            'contact' => 'sometimes|string|max:255',
            'group_id' => 'sometimes|exists:groups,id'
        ]);

        $student->update($validated);

        return response()->json($student);
    }

    /**
     * Eliminar un estudiante.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Estudiante eliminado correctamente.']);
    }
}
