<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\ValidateDataProfile;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QuickbooksController;

    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);

    Route::middleware(['auth', 'verified', ValidateDataProfile::class])->group(function () {
        Route::get('/Inicio', function () {
            return view('home');
        })->name('inicio');

        Route::get('/clientes', [ClientController::class, 'index']) -> name('client.index');
        Route::post('/clientes', [ClientController::class, 'store']) -> name('client.store');
    });
    
    

Route::middleware('auth')->group(function () {
    Route::get('/Perfil', [ProfileController::class, 'create'])->name('profile.completeprofile');
    Route::put('/Perfil', [ProfileController::class, 'store']) -> name('user.profile.update');
    //Ruta para obtener la dirección del usuario ingresando el codigo postal
    Route::get('/Perfil/fetchAddress', [ProfileController::class, 'fetchAddress']) -> name('profile.fetchaddress');
    //_______________________________________________________________________________________________________
    Route::delete('/Perfil', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('/connect/quickbooks', [QuickbooksController::class, 'connect'])
        ->name('connect.quickbooks');
    Route::get('/callback/quickbooks', [QuickbooksController::class, 'callback'])
        ->name('callback.quickbooks');
});

require __DIR__.'/auth.php';

