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

// Ruta de login (sin necesidad de autenticación)
Route::post('login', [AuthController::class, 'login']);

// Agrupar rutas que requieren autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('groups', GroupController::class);
    Route::apiResource('incidents', IncidentController::class);
    Route::apiResource('lessons', LessonController::class);
    Route::apiResource('managers', ManagerController::class);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('trips', TripController::class);
    Route::apiResource('tutors', TutorController::class);
});
