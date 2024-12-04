<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TaxRegime;
use App\Models\Township;
use App\Models\Locality;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\alert;

class CompletePerfilController extends Controller
{

    public function index() {
        $user = Auth::user();
        $TaxRegimes = TaxRegime::all();
        
        return view('Login-registre.AddDataprofile', compact('user', 'TaxRegimes'));
        
    }

    public function update(Request $request) {
        $request -> validate([
            'social_reason' => 'required', 'string', 'max:255', 'unique:users',
            'rfc' => ['required', function ($attribute, $value, $fail) {
                if (!$this->rfcValido($value)) {
                    $fail('El RFC no es válido');
                }
            }],
        ]);

        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('Inicio');
    }

    public function getAddress(Request $request)
{
    // Verifica que el código postal sea ingresado
    if (!$request->has('postal_code')) {
        return response()->json(['error' => 'Código postal no proporcionado.'], 400);
    }

    // Busca el código postal
    $PostalCode = PostalCode::where('c_PostalCode', $request->postal_code)->first();

    if (!$PostalCode) {
        return response()->json(['error' => 'Código postal no encontrado.'], 404);
    }

    // Busca las descripciones relacionadas
    $State = State::where('c_State', $PostalCode->c_State)->first();
    $Township = Township::where('c_Township', $PostalCode->c_Township) 
        ->where('c_State', $PostalCode->c_State)
        ->first();
    $Locality = Locality::where('c_Locality', $PostalCode->c_Locality)
        ->where('c_State', $PostalCode->c_State)
        ->first();
    
    return response()->json([
        'PostalCode' => $PostalCode,
        'State' => $State,
        'Township' => $Township,
    ]);
}
}


