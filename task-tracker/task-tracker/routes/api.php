<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController; // Added TaskController import

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Task API routes
    Route::apiResource('tasks', TaskController::class);
});

// Fallback for /api which is often hit by default by browsers or if no specific route is matched under /api
Route::get('/', function () {
    return response()->json(['message' => 'API Base Route']);
});
