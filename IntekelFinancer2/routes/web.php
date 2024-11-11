<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login-registre.Welcome');
}) ->name('Login');


require __DIR__.'/auth.php';
