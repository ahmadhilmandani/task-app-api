<?php

use App\Http\Controllers\api\v1\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('v1')->group(function () {
    Route::get('/task', [TaskController::class, 'store']);
});