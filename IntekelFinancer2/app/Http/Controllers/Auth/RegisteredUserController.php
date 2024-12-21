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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'password_confirmation' => ['required'],
        'terms' => ['accepted'],
    ], [
        'email.unique' => 'El correo electrónico ya está registrado.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'terms.accepted' => 'Debe aceptar los términos y condiciones.',
    ]);

    // Crear usuario
    $user = User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),

    ]);

    // No autenticar automáticamente, solo dispara el evento
    event(new Registered($user));

    Auth::login($user);

    // Redirigir al usuario a la página de login con un mensaje
    return redirect()->route('Login')->with('success', '¡Registro exitoso! Por favor, verifique el correo electrónico.');
}
}




