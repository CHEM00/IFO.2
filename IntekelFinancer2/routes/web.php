<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\CompletePerfilController;
use App\Http\Middleware\ValidateUserProfile;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;

    Route::get('/Usuario/Completar-Perfil', [CompletePerfilController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('user.profile');

    Route::put('/Usuario/Completar-Perfil', [CompletePerfilController::class, 'update'])
    ->middleware('auth', 'verified')    
    ->name('user.profile.update');

    Route::get('/Usuario/ObtenerDireccion', [CompletePerfilController::class, 'getAddress'])
    ->middleware('auth', 'verified')
    ->name('user.get.address');


Route::post('/Clientes', [ClientController::class, 'store'])
    ->middleware('auth', 'verified')
    ->name('client.store');

Route::middleware(['auth', 'verified', ValidateUserProfile::class])->group(function () {
    
    Route::get('/Inicio', [InicioController::class, 'create'])
        ->name('Inicio');

    Route::get('/Clientes', [ClientController::class, 'create'])
        ->name('client.index');
    
    Route::get('/Productos_servicios', [ItemController::class, 'create'])
        ->name('item.index');
    
    Route::post('/Productos_servicios', [ItemController::class, 'store']);
    
});

require __DIR__.'/auth.php';