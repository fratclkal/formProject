<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Yajra\DataTables\Facades\DataTables;

class FormController extends Controller
{
    public function login()
    {
        return view('homepage.login');
    }

    public function index()
    {
        return view('homepage.form');
    }

    public function createForm(Request $request)
    {
        $request->validate([
            'name' => 'required | max:255',
            'sur_name' => 'required | max:255',
            'tc_no' => 'required | string | digits:11',
            'e_mail' => 'required | string | max:255 | email',
            'phone_num' => 'required | numeric',
            'kvkk' => 'required | in:1,0',
            'kullanim' => 'required | in:1,0',
            'start_date' => 'required | date',
            'end_date' => 'nullable | date',
            'price' => 'nullable | string | numeric',
            'payment_type' => 'required | in:2,1,0',
            'images.*' => ['required', 'image', 'max:2048', 'mimes:jpg,png']
        ]);

        $files = $request->file('images');
        if(count($files) == 0){
            return response('hata');
        }

        $form = new Form();
        $form->user_id = Auth::id();
        $form->name = $request->name;
        $form->sur_name = $request->sur_name;
        $form->tc_no = $request->tc_no;
        $form->e_mail = $request->e_mail;
        $form->phone_num = $request->phone_num;
        $form->kvkk = $request->kvkk;
        $form->kullanim = $request->kullanim;
        $form->start_date = $request->start_date;
        $form->end_date = $request->end_date;
        $form->price = $request->price;
        $form->payment_type = $request->payment_type;

        $form->save();

        if ($request->hasFile('images')) {


            $files = $request->file('images');

            $file_create_arrays = [];

            foreach ($files as $file) {

                if (strlen($file->getClientOriginalName()) > 9) {
                    $start = strlen($file->getClientOriginalName()) - 9;
                } else {
                    $start = 0;
                }

                $path = 'forms/form_images/'.date('Y-m-d').'/';
                $filename = time().Auth::id().substr($file->getClientOriginalName(), $start);
                $file->move(public_path() . '/'.$path, $filename);
                $filename = $path . $filename;

                $file_create_arrays[] = [
                    'form_id' => $form->id,
                    'path' => $filename,
                ];

            }

            foreach ($file_create_arrays as $arr){
                File::create($arr);
            }




        }

        return response()->json(['success' => true]);
    }

    public function fetch(){
        $forms = Form::where('user_id', Auth::id())->orderByDesc('created_at')->get()->take(5);

        return DataTables::of($forms)
            ->editColumn('name', function ($data){
                return $data->name.' '.$data->sur_name;
            })
            ->addColumn('creator', function ($data){
                return $data->getUser->name;
            })
            ->addColumn('delete', function ($data){
                return '<a class="btn btn-primary mr-1" target="_blank" href="'.route('front.show.forms', $data->id).'">Güncelle</a> ';
            })->rawColumns(['delete'])->make();
    }

    public function show($id){
        $form = Form::where('id', $id)->first();
        if (Auth::id() == $form->user_id){
            return view('panel.showForm', compact('form'));
        }
    }
}
