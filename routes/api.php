<?php

use App\Http\Controllers\api\v1\TaskController;
use App\Http\Controllers\api\v1\TaskStepController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::apiResource('/task', TaskController::class);
    Route::put('/change-status/task/{task_id}', [TaskController::class, 'changeTaskStatus']);
    Route::post('/task-step/{task_id}', [TaskStepController::class, 'store']);
    Route::put('/task-step/{task_step_id}', [TaskStepController::class, 'update']);
    Route::delete('/task-step/{task_step_id}', [TaskStepController::class, 'destroy']);
    
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

