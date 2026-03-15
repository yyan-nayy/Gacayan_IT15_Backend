<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SchoolDayController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('students', StudentController::class)->only(['index','show']);
    Route::apiResource('courses', CourseController::class)->only(['index','show']);
    Route::apiResource('school-days', SchoolDayController::class)->only(['index','show']);
    Route::apiResource('enrollments', EnrollmentController::class)->only(['index', 'show', 'store']);

    // Dashboard charts
    Route::get('/stats/enrollments', [StudentController::class, 'enrollmentStats']);
});

Route::get('/token-test', function () {
    $user = \App\Models\User::first();
    return $user->createToken('test')->plainTextToken;
});