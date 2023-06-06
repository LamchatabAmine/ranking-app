<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\View\View;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\View;

class StaticController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('app.index', compact('categories', 'cities'));
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


    public function show(Request $request)
    {
        return View::make('profile.user', [
            'user' => $request->user(),
        ]);
    }
}
