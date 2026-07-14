<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiculoController; // <-- Agregamos al nuevo gerente

Route::get('/', function () {
    return view('welcome');
});

// Módulo Dashboard
Route::get('/panel', [DashboardController::class, 'inicio']);

// Módulo Vehículos (Fase 1: Leer y Crear)
Route::get('/vehiculos', [VehiculoController::class, 'index']);      // La Tabla
Route::get('/vehiculos/crear', [VehiculoController::class, 'create']); // El Formulario
Route::post('/vehiculos', [VehiculoController::class, 'store']);     // El Guardado
// Módulo Vehículos (Fase 2: Editar)
Route::get('/vehiculos/{id}/editar', [VehiculoController::class, 'edit']);
Route::put('/vehiculos/{id}', [VehiculoController::class, 'update']);
// Módulo Vehículos (Fase 3: Eliminar)
Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy']);