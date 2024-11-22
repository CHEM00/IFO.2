<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class CompletePerfilController extends Controller
{
    public function create() {
        $user = Auth::user();
        return view('Login-registre.AddDataprofile', compact('user'));
    }

    public function update(Request $request) {
        Auth::user()->update($request->all()); // The comand update mark a error but the code is funcionality
        return redirect()->route('Inicio');
    }

}

