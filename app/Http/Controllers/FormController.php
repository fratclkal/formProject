<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function login(){
        return view('homepage.login');
    }

    public function index(){
        return view('homepage.form');
    }

    public function createForm(Request $request){
        $request -> validate([
            'name' => 'required | max:255',
            'sur_name' => 'required | max:255',
            'tc_no' => 'required | string | digits | min:11 | max:11',
            'e_mail' => 'required | string | max:255 |',
            'phone_num' => 'required | digits',
            'kvkk' => 'required | in:1,0',
            'kullanim' => 'required | in:1,0',
            'start_date' => 'required | date',
            'end_date' => 'required | date',
            'price' => 'required | string | digits',
            'payment_type' => 'required | in:1,0',
            'images.*' => ['image', 'max:2048', 'mimes:jpg,png']
        ]);


    }
}
