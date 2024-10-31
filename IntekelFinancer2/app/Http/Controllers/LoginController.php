<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\Users;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{

    public function ShowWelcome() {
        return view('Login-registre.Welcome');
    }

    public function ShowRegistre() {
        return view('Login-registre.Registre');
    }

    public function Login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Users::where('email', $email)->first();
        if ($user) {
            if ($user->password == $password) {
                return redirect()->route('Inicio');
            } else {
                return redirect()->route('Login');
            }
        } else {
            return redirect()->route('Login');
        }
    }

    public function Registre(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm_password = $request->input('password_confirmation');
        if ($password == $confirm_password) {
            $user = new Users();
            $user->email = $email;
            $user->password = $password;
            $user->save();
            Alert('Usuario registrado con éxito');
            return redirect()->route('Inicio');    
        } else {
            return redirect()->route('Registre');
        }
        
    }

    
}
