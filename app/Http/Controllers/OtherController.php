<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function root(Request $request){
        return view('welcome');
    }

    public function home(Request $request){
        return view('home');
    }
}
