<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function Registro() {
        return view('Registre');
    }

    public function Login() {
        return view('Login');
    }

    public function Home () {
        return view('Inicio');
    }


}
