<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function app(){
        return view('app');
    }

    public function listUsers(){
        return view('panel.listUsers');
    }
}
