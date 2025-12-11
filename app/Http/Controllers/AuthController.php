<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]); 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('home');
    }

    public function login(Request $request){
        if(Auth::attemp(only('email', 'password'))){
            return redirect()->intended(route('home'));
        }
        return back()->withErrors([
            'message' => 'Invalid Credentials'
        ]);
    }

    public function logout(){
        Auth::logout();
        return view('logout');
    }
}
