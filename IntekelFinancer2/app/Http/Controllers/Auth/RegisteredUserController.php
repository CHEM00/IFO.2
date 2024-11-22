<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('Login-registre.Registre');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): View
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
            'terms' => ['accepted'],
        ], [
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'terms.accepted' => 'Debe aceptar los términos y condiciones.',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Agregar mensaje flash
        session()->flash('success', 'Usuario registrado exitosamente. Por favor, verifica tu correo electrónico.');
        return view('Login-registre.Welcome');
    }
}
