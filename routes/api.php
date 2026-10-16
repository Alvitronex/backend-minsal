<?php

use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TareasController::class, 'index']);
Route::post('/tasks', [TareasController::class, 'store']);
Route::delete('/tasks/{id}', [TareasController::class, 'destroy']);