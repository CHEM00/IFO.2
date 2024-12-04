<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function create(){
        $clients = Auth::user()->clients;
        return view('Clients.client', compact('clients'));
    }

    public function store(Request $request){
        try {
        Auth::user()->clients()->create($request->all());
        return redirect()->route('client.index') ->with('success', 'Cliente creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('client.index') ->with('error', 'Error al crear el cliente');
        }
    }

    public function edit($id){
        $client = Auth::user()->clients()->find($id);
        return view('Clients.edit', compact('client'));
    }

    public function destroy($id){
        try {
            Auth::user()->clients()->find($id)->delete();
            return redirect()->route('client.index') ->with('success', 'Cliente eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('client.index') ->with('error', 'Error al eliminar el cliente');
        }
    }
}
