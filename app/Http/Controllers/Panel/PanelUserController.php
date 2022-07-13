<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

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

    function update(Request $request){
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'email' => ['required', 'email', 'unique:users,email,'.$request->user_id, 'max:255'],
            'password' => ['nullable','confirmed'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::where('id', $request->user_id)->first();
        if ($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        return response()->json(['success' => true]);
    }

    public function fetch(){
        $users = User::query()->where('role', '!=', 'Admin');

        return DataTables::of($users)->addColumn('delete', function ($data){
            return '<button class="btn btn-primary mr-1" onclick="update('.$data->id.')">Güncelle</button>'.
                '<button class="btn btn-danger" onclick="deletePost('.$data->id.')">Sil</button>';
        })->rawColumns(['delete'])->make();
    }

    public function get(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);
        $announcement = User::find($request->id);
        return response()->json(['id' => $announcement->id, 'name' => $announcement->name, 'email' => $announcement->email]);
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        User::find($request->id)->delete();
        return response()->json(true);
    }

}
