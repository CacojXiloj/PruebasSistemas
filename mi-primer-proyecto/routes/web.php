<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // <--- ¡Esta línea es la clave!

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "Hola XD, ya va queriendo la cosa";
});

Route::get('/panel', [DashboardController::class, 'inicio']); // Aprovechemos y conectemos también el panel al controlador

Route::get('/vehiculos/crear', [DashboardController::class, 'crear']);
Route::post('/vehiculos/guardar', [DashboardController::class, 'guardar']);