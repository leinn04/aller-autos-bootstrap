<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación (accesibles solo si NO ha iniciado sesión)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

// Logout (accesible solo si ha iniciado sesión)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Rutas protegidas: solo usuarios autenticados pueden gestionar clientes y vehículos
Route::middleware('auth')->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('vehiculos', VehiculoController::class);
});