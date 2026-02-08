<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user:uuid}', [UserController::class, 'show']);
Route::put('/users/{user:uuid}', [UserController::class, 'update']);
Route::delete('/users/{user:uuid}', [UserController::class, 'destroy']);
