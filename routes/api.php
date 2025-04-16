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

Route::apiResource('grupos', GroupController::class);

Route::apiResource('incidentes', IncidentController::class);

Route::apiResource('clases', LessonController::class);

Route::apiResource('equipo-directivo', ManagerController::class);

Route::apiResource('alumnado', StudentController::class);

Route::apiResource('profesorado', TeacherController::class);

Route::apiResource('salidas', TripController::class);

Route::apiResource('tutores', TutorController::class);
