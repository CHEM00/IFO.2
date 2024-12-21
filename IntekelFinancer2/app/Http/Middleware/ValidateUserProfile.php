<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateUserProfile
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verificar que el usuario esté autenticado
        if (!$user) {
            return redirect()->route('Login');
        }

        // Campos requeridos para validar
        $requiredFields = [
            'social_reason',
            'c_TaxRegime',
            'rfc',
            'hour_zone',
            'c_PostalCode',
            'c_Township',
            'c_State',
            'c_Country',
            'c_Locality',
            'c_Colony',
            'address',
            'phone',
        ];

        // Verificar si alguno de los campos está vacío
        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                // Redirigir a la página de actualización de perfil con un mensaje
                return redirect()->route('user.profile.update')
                    ->with('error', 'Por favor, completa tu perfil para poder utilizar el sistema.');
            }
        }

        // Si todos los campos están completos, permitir la navegación
        return $next($request);
    }
}
