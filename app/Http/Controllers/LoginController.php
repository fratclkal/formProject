<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'Admin'){
                return redirect()->route('listForms');
            }else{
                return redirect()->route('index');
            }

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function register(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'Admin';
        $user->save();

        return redirect()->route('login');
    }

    function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
