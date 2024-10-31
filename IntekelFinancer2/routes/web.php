<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class,'ShowWelcome'] ) -> name('Login');
Route::post('/login', [LoginController::class, 'Login']);
Route::get('/registre', [LoginController::class, 'ShowRegistre']) -> name('Registre');
Route::post('/registre', [LoginController::class, 'Registre']) -> name('Registre');

Route::get('/inicio', [RutasController::class, 'Home']) -> name('Inicio');

Route::get('/facturas', function () {
    return view ('invoices.Invoice');
}) -> name('innvoice');


Route::get('/Usuarios', [UserController::class, 'MostrarUsuario']) -> name('User');

Route::get('/Productos', function () {
    return view ('products.Products');
}) -> name('Product');

Route::get('/facturas_programadas', function() {
    return view ('invoices.ProgramInvoice');
}) -> name('ProgramInvoice');

Route::get('/Notas_de_credito', [RutasController::class, 'CreditNote']) -> name('CreditNote');

Route::get('/Clientes', function() {
    return view ('Clients.Client');
}) -> name('Client');

Route::get('/Pagos', function() {
    return view ('Payments.Payment');
}) -> name('Payment');

Route::get('/Productos', function() {
    return view ('Items.Item');
}) -> name('Item');
