<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;

class PanelFormsController extends Controller
{
    public function listForms(){
        return view('panel.listForms');
    }

    function show($id){
        $validator = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|exists:forms,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $form = Form::find($id);


        return view('panel.showForm', compact('form'));
    }

    public function fetch(){
        $users = User::query()->where('id', '!=', Auth::id());

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
