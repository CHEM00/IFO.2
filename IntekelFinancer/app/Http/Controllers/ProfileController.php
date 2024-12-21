<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\TaxRegime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\PostalCode;
use App\Models\State;
use App\Models\Township;
use App\Models\Locality;
use App\Models\Colony;
use App\Models\Country;

class ProfileController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $taxRegimes = TaxRegime::all();
        $country = Country::where('country_code', $user->country_code)->first();
        $state = State::where('state_code', $user->state_code)->first();
        $township = Township::where('township_code', $user->township_code)->where('state_code', $user->state_code)->first();
        $locality = Locality::where('locality_code', $user->locality_code)->where('state_code', $user->state_code)->first();
        $colony = Colony::where('postal_code', $user->postal_code)->first();
        return view('profile.completeprofile', compact('user','country','taxRegimes', 'state', 'township','locality','colony')  );
    }

    public function store(Request $request)
    {
        
        $user = Auth::user();
        $user -> update($request->all());
        return Redirect::back()->with('success', 'Perfil actualizado correctamente.');

    }
    public function fetchAddress(Request $request)
    {
        if (!$request->has('postal_code')) {
            return response()->json(['error' => 'Código postal no proporcionado.'], 400);
        }

        $postalCode = PostalCode::where('postal_code', $request->postal_code)->first();

        if (!$postalCode) {
            return response()->json(['error' => 'Código postal no encontrado.'], 404);
        }

        // Obtenemos el estado asociado al código postal
        $state = $postalCode->state;  // Ya no necesitamos hacer otra consulta
        $country = $state->country;
        $township = Township::where('township_code', $postalCode->township_code)
            ->where('state_code', $postalCode->state_code)->first();
        $locality = Locality::where('locality_code', $postalCode->locality_code)
            ->where('state_code', $postalCode->state_code)->first();
        $colony = Colony::where('postal_code', $postalCode->postal_code)->get();
        return response()->json([
            'state' => $state,  // Nombre del estado
            'country' => $country, // Nombre del país
            'township' => $township,
            'locality' => $locality,
            'colony' => $colony
        ]);
    }
}


