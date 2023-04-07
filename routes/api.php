<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/getme', [UserController::class, 'getme']);
    Route::post('/tasks', [TaskController::class, 'addTask']);
    Route::get('/tasks', [TaskController::class, 'getTask']);
    Route::patch('/tasks/{task}', [TaskController::class, 'updateTask']);
});
