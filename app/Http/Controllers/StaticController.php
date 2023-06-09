<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
// use Illuminate\View\View;
use App\Models\Business;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\View;

class StaticController extends Controller
{
    public function home()
    {
        $businesses = Business::all();
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();

        return View::make('app.index', [
            'categories' => $categories,
            'businesses' => $businesses,
            'cities' => $cities,
            'galleries' => $galleries,
        ]);
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
        $businesses = Business::all();
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();

        return View::make('app.listing', [
            'categories' => $categories,
            'businesses' => $businesses,
            'cities' => $cities,
            'galleries' => $galleries,
        ]);
    }


    public function show(Request $request)
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        $businesses = Business::where('user_id', Auth::id())->get();


        return View::make('profile.user', [
            'user' => $request->user(),
            'categories' => $categories,
            'businesses' => $businesses,
            'galleries' => $galleries,
        ]);
    }
}
