<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function MostrarUsuario() {
        $users = Users::all();
        return view('users.user',compact('users'));
    }
}
