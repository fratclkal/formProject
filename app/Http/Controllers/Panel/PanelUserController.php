<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PanelUserController extends Controller
{

    function register(){
        return view('panel.register');
    }

    function create(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'confirmed'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json(['success' => true]);
    }
}
