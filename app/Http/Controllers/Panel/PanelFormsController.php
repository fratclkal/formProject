<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PanelFormsController extends Controller
{
    public function listForms(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('panel.listForms', compact('users'));
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

    public function fetch($user_id, $start_date, $end_date){
        $forms = Form::query()->whereNot('user_id',Auth::id());

        if ($user_id != 0){
            $forms->where('user_id', $user_id);
        }

        if ($start_date != 0){
            $forms->where('created_at', '>=', $start_date);
        }

        if ($end_date != 0){
            $forms->where('created_at', '<=', $end_date);
        }

        return DataTables::of($forms)
            ->editColumn('name', function ($data){
                return $data->name.' '.$data->sur_name;
            })
            ->addColumn('creator', function ($data){
                return $data->getUser->name;
            })
            ->addColumn('delete', function ($data){
            return '<a class="btn btn-primary mr-1" target="_blank" href="'.route('panel.forms.show', $data->id).'">Gör</a> '.
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
            'id' => 'required|exists:forms,id'
        ]);

        Form::find($request->id)->delete();
        return response()->json(true);
    }
}
