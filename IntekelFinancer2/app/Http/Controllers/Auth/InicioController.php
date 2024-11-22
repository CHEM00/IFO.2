<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function create () {
        return view('Login-registre.Inicio');
    }
}
