<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TaxRegime;
use App\Models\Township;
use App\Models\Locality;
use App\Models\State;
use App\Models\Colony;


class CompletePerfilController extends Controller
{

    public function index() {
        $user = Auth::user();
        $TaxRegimes = TaxRegime::all();
        return view('Login-registre.AddDataprofile', compact('user', 'TaxRegimes'));
    }

    public function update(Request $request) {
        $request->validate([
            'social_reason' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'tax_regime' => 'required|exists:taxregimes,c_TaxRegime',
            'hour_zone' => 'required|string|max:255',
            'postal_code' => 'required|exists:postalcodes,c_PostalCode',
            'country' => 'required|exists:countrys,c_Country',
            'state' => 'required|exists:states,c_State',
            'township' => 'required|exists:townships,c_Township',
            'locality' => 'required|exists:localitys,c_Locality',
            'colony' => 'required|exists:colonys,c_Colony',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = Auth::user();
        $user->fill($request->except('logo'));
    
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $user->logo = $path;
        }
    
        $user->save();
    
        return redirect()->route('Inicio')->with('success', 'Datos actualizados correctamente.');
    }
    


    public function getAddress(Request $request)
    {
        if (!$request->has('postal_code')) {
            return response()->json(['error' => 'Código postal no proporcionado.'], 400);
        }

        $PostalCode = PostalCode::where('c_PostalCode', $request->postal_code)->first();

        if (!$PostalCode) {
            return response()->json(['error' => 'Código postal no encontrado.'], 404);
        }

        $State = State::where('c_State', $PostalCode->c_State)->first();
        $Country = $State ? $State->c_Country : null;

        $Township = null;
        if ($PostalCode->c_Township) {
            $Township = Township::where('c_Township', $PostalCode->c_Township)
                ->where('c_State', $PostalCode->c_State)
                ->first();
        }

        $Locality = null;
        if ($PostalCode->c_Locality) {
            $Locality = Locality::where('c_Locality', $PostalCode->c_Locality)
                ->where('c_State', $PostalCode->c_State)
                ->first();
        }

        $Colonies = Colony::where('c_PostalCode', $PostalCode->c_PostalCode)->get();
        return response()->json([
            'PostalCode' => $PostalCode,
            'State' => $State,
            'Township' => $Township,
            'Country' => $Country,
            'Locality' => $Locality,
            'Colonies' => $Colonies,
        ]);

    
}

}


