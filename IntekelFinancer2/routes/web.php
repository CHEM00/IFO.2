<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\CompletePerfilController;
use App\Http\Middleware\ValidateUserProfile;
use App\Http\Controllers\ClientController;

Route::get('/Update-perfil', [CompletePerfilController::class, 'create'])
    ->middleware('auth')
    ->name('user.profile');

Route::put('/Update-perfil', [CompletePerfilController::class, 'update'])
    ->middleware('auth', 'verified')    
    ->name('user.profile.update');

Route::post('/Clientes', [ClientController::class, 'store'])
    ->middleware('auth', 'verified');

Route::middleware(['auth', 'verified', ValidateUserProfile::class])->group(function () {
    
    Route::get('/Inicio', [InicioController::class, 'create'])
        ->name('Inicio');

    Route::get('/Clientes', [ClientController::class, 'create'])
        ->name('client.index');
});

require __DIR__.'/auth.php';