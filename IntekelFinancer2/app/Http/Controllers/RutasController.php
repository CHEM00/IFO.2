<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function Registro() {
        return view('Login-registre.Registre');
    }

    public function Home () {
        return view('Login-registre.Inicio');
    }

    public function CreditNote() {
        return view('Credit-Notes.CreditNote');
    }

}
