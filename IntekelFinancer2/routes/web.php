<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutasController;

Route::get('/registrarse', [RutasController::class, 'Registro']) -> name('Registre');

Route::get('/login', [RutasController::class, 'Login']) -> name('Login');

Route::get('/inicio', [RutasController::class, 'Home']) -> name('Inicio');

Route::get('/facturas', function () {
    return view ('innvoice.pending-innvoice');
}) -> name('pending-innvoice');