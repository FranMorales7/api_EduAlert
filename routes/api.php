<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Ruta de login (sin necesidad de autenticación)
Route::post('login', [AuthController::class, 'login']);

// Rutas que requieren autenticación y no ser admin (TEACHER)
Route::middleware('auth:sanctum')->group(function () {

    // Incidentes
    Route::apiResource('incidents', IncidentController::class);
    Route::get('/incidents/user/{user}', [IncidentController::class, 'filterByUser']);

    // Salidas
    Route::apiResource('trips', TripController::class);
    Route::get('/trips/user/{user}', [TripController::class, 'filterByUser']);

    // Usuario
    Route::apiResource('users', UserController::class);

    // Estudiante
    Route::apiResource('students', StudentController::class);

    // Profesor
    Route::get('/teachers/byUser/{userId}', [TeacherController::class, 'filterByUserId']);
    Route::post('/teachers/byUser/{userId}', [TeacherController::class, 'update']); 

    Route::apiResource('teachers', TeacherController::class);

    // Grupos y lecciones
    Route::apiResource('groups', GroupController::class);
    Route::apiResource('lessons', LessonController::class);

    // Tutores
    Route::apiResource('tutors', TutorController::class);
});

// Rutas que requieren autenticación y ser admin (MANAGER)
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/data', [ManagerController::class, 'index']);
});