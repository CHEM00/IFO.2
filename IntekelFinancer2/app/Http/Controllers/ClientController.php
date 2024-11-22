<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function create(){
        
        return view('Clients.client');
    }

    public function store(Request $request){

    }
}
