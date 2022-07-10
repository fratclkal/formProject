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
}
