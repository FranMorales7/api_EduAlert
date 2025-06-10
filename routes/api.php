<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\UserController;
use App\Models\ClassRoom;
use App\Models\Lesson;

// Ruta de login (sin necesidad de autenticación)
Route::post('/login', [AuthController::class, 'login']);

// Rutas que requieren autenticación y no ser admin (TEACHER)
Route::middleware('auth:sanctum')->group(function () {

    // Incidentes
    Route::get('/incidents', [IncidentController::class, 'index']);
    Route::post('/incidents', [IncidentController::class, 'store']);
    Route::delete('/incidents/{incident}', [IncidentController::class, 'destroy']);
    Route::put('/incidents/{incident}', [IncidentController::class, 'update']);
    Route::get('/incidents/user/{user}', [IncidentController::class, 'filterByUser']);

    // Salidas
    Route::get('/trips', [TripController::class, 'index']);
    Route::post('/trips', [TripController::class, 'store']);
    Route::delete('/trips/{trip}', [TripController::class, 'destroy']);
    Route::put('/trips/{trip}', [TripController::class, 'update']);
    Route::get('/trips/user/{user}', [TripController::class, 'filterByUser']);

    // Usuario
    Route::apiResource('users', UserController::class);

    // Estudiante
    Route::apiResource('students', StudentController::class);

    // Profesor
    Route::get('/teachers/byUser/{userId}', [TeacherController::class, 'filterByUserId']);
    Route::post('/teachers/byUser/{userId}', [TeacherController::class, 'update']); 
    Route::apiResource('teachers', TeacherController::class);

    // Aulas
    Route::get('/classRooms', [ClassRoomController::class, 'index']);

    // Lecciones
    Route::get('/lessons/schedule/{teacherId}', [LessonController::class, 'getSchedule']);
    Route::get('/lessons', [LessonController::class, 'index']);

    // Grupos
    Route::get('/groups', [GroupController::class, 'index']);

    // Cambio de contraseña
    Route::middleware('auth:sanctum')->patch('/user/password', [UserController::class, 'updatePassword']);

});

// Rutas que requieren autenticación y ser admin (MANAGER)
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/data', [ManagerController::class, 'index']);
    Route::get('/manager/byUser/{userId}', [ManagerController::class, 'filterByUserId']);
    Route::put('/manager/byUser/{userId}', [ManagerController::class, 'update']); 
    
    // Incidentes
    Route::get('/incidents/solved', [IncidentController::class, 'deleteSolvedIncidents']);
    Route::get('/trips/solved', [TripController::class, 'deleteSolvedTrips']);
    
    // Clases
    Route::post('/lessons', [LessonController::class, 'store']);
    Route::put('/lessons/{lesson}', [LessonController::class, 'update']);
    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy']);

    // Grupos
    Route::get('/groups/{group}', [GroupController::class, 'show']);
    Route::put('/groups/{group}', [GroupController::class, 'update']);
    Route::post('/groups', [GroupController::class, 'store']);
    Route::delete('/groups/{group}', [GroupController::class, 'destroy']);

    // Aulas
    Route::post('/classRooms', [ClassRoomController::class, 'store']);
    Route::put('/classRooms/{classRoom}', [ClassRoomController::class, 'update']);
    Route::delete('/classRooms/{classRoom}', [ClassRoomController::class, 'destroy']);

});