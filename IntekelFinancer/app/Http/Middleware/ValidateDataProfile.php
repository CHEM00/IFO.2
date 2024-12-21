<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateDataProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verificar que el usuario esté autenticado
        if (!$user) {
            return redirect()->route('login');
        }

        // Campos requeridos para validar
        $requiredFields = [
            'social_reason',
            'email',
            'phone',
            'rfc',
            'logo',
            'postal_code',
            'colony_name',
            'township_code',
            'state_code',
            'locality_code',
            'country_code',
            'address',
            'tax_regime_id',
        ];

        // Verificar si alguno de los campos está vacío
        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                // Redirigir a la página de actualización de perfil con un mensaje
                return redirect()->route('profile.completeprofile')
                    ->with('error', 'Por favor, completa tu perfil para poder utilizar el sistema.');
            }
        }

        // Si todos los campos están completos, permitir la navegación
        return $next($request);
    }
}