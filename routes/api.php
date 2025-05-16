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

// Grupo de rutas que requieren autenticación y no ser admin (TEACHER)
Route::middleware('auth:sanctum')->group(function () {

    // Incidentes
    Route::apiResource('incidents', IncidentController::class);
    Route::get('/incidents/user/{user}', [IncidentController::class, 'filterByUser']);


    // Salidas
    Route::apiResource('trips', TripController::class);
    Route::get('/trips/user/{user}', [TripController::class, 'filterByUser']);

    // Usuario
    Route::apiResource('users', UserController::class);
    Route::get('/users/{userId}', [UserController::class, 'show']);
    Route::get('/users/getInfoTeacher/{email}', [UserController::class, 'getInfoTeacher']);

    // Estudiante
    Route::apiResource('students', StudentController::class);

    // Profesor
    Route::get('/teachers/{userId}', [TeacherController::class, 'filterByUserId']);
    Route::put('/teachers/edit/{userId}', [TeacherController::class, 'update']);

    Route::apiResource('groups', GroupController::class);
    Route::apiResource('lessons', LessonController::class);
    Route::apiResource('teachers', TeacherController::class);
    
    Route::apiResource('tutors', TutorController::class);
});

// Grupo de rutas que requieren autenticación y ser admin (MANAGER)
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/data', [ManagerController::class, 'index']);
    // Route::apiResource('/admin/students', StudentController::class);
});

