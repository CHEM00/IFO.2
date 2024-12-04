<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view('Items.item');
    }

    public function store(Request $request){
        try {
            Auth::user()->items()->create($request->all());
            return redirect()->route('item.index') ->with('success', 'Producto creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('item.index') ->with('error', 'Error al crear el producto');
        }
    }

    public function edit($id){
        $item = Auth::user()->items()->find($id);
        return view('Items.edit', compact('item'));
    }

    public function destroy($id){
        try {
            Auth::user()->items()->find($id)->delete();
            return redirect()->route('item.index') ->with('success', 'Producto eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('item.index') ->with('error', 'Error al eliminar el producto');
        }
    }
}
