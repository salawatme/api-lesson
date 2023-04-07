<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/getme', [UserController::class, 'getme']);
    Route::prefix('/tasks')
        ->controller(TaskController::class)
        ->group(function (){
        Route::post('/', 'addTask');
        Route::get('/', 'getTask');
        Route::patch('/{task}','updateTask');
    });
});
