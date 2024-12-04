<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::middleware('guest')->group(function () {

    Route::get('/registro', [RegisteredUserController::class, 'create']) ->name('register');
    Route::post('/registro', [RegisteredUserController::class, 'store']);

    Route::get('/', [AuthenticatedSessionController::class, 'create']) ->name('Login');
    Route::post('/', [AuthenticatedSessionController::class, 'store']);
    
});

Route::middleware('auth')->group(function () {

    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Correo de verificación enviado!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
