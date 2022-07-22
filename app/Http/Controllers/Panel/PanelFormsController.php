<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormExport;

class PanelFormsController extends Controller
{
    public function listForms(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('panel.listForms', compact('users'));
    }

    public function total_price($user_id, $start_date, $end_date,$start_start_date,$start_end_date,$end_start_date,$end_end_date,$endless,$payment_type){
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

        if ($start_start_date != 0){
            $forms->where('start_date', '>=', $start_start_date);
        }

        if ($start_end_date != 0){
            $forms->where('start_date', '<=', $start_end_date);
        }

        if ($end_start_date != 0){
            $forms->where('end_date', '>=', $end_start_date);
        }

        if ($endless == 1){
            $forms->whereNull('end_date');
        }else if ($end_end_date != 0){
            $forms->where('end_date', '<=', $end_end_date);
        }

        if ($payment_type < 3 && $payment_type >= 0){
            $forms->where('payment_type', $payment_type);
        }



        return response()->json(['total_price' => $forms->sum('price')]);
    }

    public function download_excel($user_id, $start_date, $end_date){
        return Excel::download(new FormExport($user_id, $start_date, $end_date), 'forms.xlsx');

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

    public function fetch($user_id, $start_date, $end_date,$start_start_date,$start_end_date,$end_start_date,$end_end_date,$endless,$payment_type){
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

        if ($start_start_date != 0){
            $forms->where('start_date', '>=', $start_start_date);
        }

        if ($start_end_date != 0){
            $forms->where('start_date', '<=', $start_end_date);
        }

        if ($end_start_date != 0){
            $forms->where('end_date', '>=', $end_start_date);
        }

        if ($endless == 1){
            $forms->whereNull('end_date');
        }else if ($end_end_date != 0){
            $forms->where('end_date', '<=', $end_end_date);
        }

        if ($payment_type < 3 && $payment_type >= 0){
            $forms->where('payment_type', $payment_type);
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
