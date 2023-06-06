<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\View;

class StaticController extends Controller
{
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
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function listing()
    {
        return view('app.listing');
    }
    public function addListing()
    {
        return view('app.add-listing');
    }
    public function show(Request $request)
    {
        return View::make('profile.user', [
            'user' => $request->user(),
        ]);
    }
}
