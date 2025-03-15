<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('courses', CourseController::class);
Route::apiResource('tasks', TaskController::class);
