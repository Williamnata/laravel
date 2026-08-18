<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('imc.login');
    }

    public function logar(Request $request)
    {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email','password');
    
    if(!Auth::attempt($credentials)){
        return redirect('/login')
        ->withErrors('Usuários ou senha inválidos');
    }

    return to_route('imc.index');
    }
    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }
}
