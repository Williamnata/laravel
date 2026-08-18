<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegistroController extends Controller
{
    public function index()
    {
        return view('imc.registro');

    }



public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'nivel' => 'required|in:1,2,3',
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'email' =>$request ->email,
        'password' => Hash::make($request->password),
        'nivel' => $request->nivel,
    ]);

    Auth::login($user);

    return to_route('imc.index');
}
}