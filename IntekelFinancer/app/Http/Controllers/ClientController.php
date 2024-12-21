<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Auth::user()->client;
        return view('clients.client', compact('clients'));
    }

    public function store (Request $request)
    {
        try {
            Auth::user()->client()->create($request->all());
            return redirect()->route('client.index') ->with('success', 'Cliente creado correctamente');
            } catch (\Exception $e) {
                return redirect()->route('client.index') ->with('error', 'Error al crear el cliente');
            }
    }

    public function update ()
    {
        
    }

    public function destroy ()
    {
        
    }


}
