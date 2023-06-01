<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    //
    public function home()
    {
        return view('app.index');
    }
    public function about()
    {
        return view('app.about');
    }
    public function contact()
    {
        return view('app.contact');
    }
    public function login()
    {
        return view('app.login');
    }
    public function register()
    {
        return view('app.register');
    }
}
