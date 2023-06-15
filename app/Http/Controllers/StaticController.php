<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
// use Illuminate\View\View;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\View;

class StaticController extends Controller
{
    public function home()
    {
        $businesses = Business::where('isActive', 1)->get();
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
        $businesses = Business::where('isActive', 1)->paginate(6);
        $count = Business::where('isActive', 1)->count();
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();

        return View::make('app.listing', [
            'categories' => $categories,
            'businesses' => $businesses,
            'count' => $count,
            'cities' => $cities,
            'galleries' => $galleries,
        ]);
    }


    public function show(Request $request)
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        $businesses = Business::where('user_id', Auth::id())->get();
        $review = Review::all();

        return View::make('profile.user', [
            'user' => $request->user(),
            'categories' => $categories,
            'businesses' => $businesses,
            'galleries' => $galleries,
            'review' => $review,
        ]);
    }


    public function manager(Request $request)
    {
        $businesses = Business::where('isActive', 0)->paginate(6);
        $count = Business::where('isActive', 0)->count();
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();

        return view('manager.manage', [
            'user' => $request->user(),
            'categories' => $categories,
            'businesses' => $businesses,
            'count' => $count,
            'cities' => $cities,
            'galleries' => $galleries,
        ]);
    }


    public function admin(Request $request)
    {
        $users = User::where('role', 2)->count();
        $businesses = Business::where('isActive', 1)->paginate(6);
        $CountBusinesses = Business::where('isActive', 1)->count();
        $categories = Category::count();
        $cities = City::count();
        // $galleries = Gallery::count();
        return view('admin.dashboard', [
            'user' => $request->user(),
            'CountUsers' => $users,
            'CountCategories' => $categories,
            'Businesses' => $businesses,
            'CountBusinesses' => $CountBusinesses,
            'CountCities' => $cities,
            // 'CountGalleries' => $galleries,
        ]);
    }

    public function dashboardListings(Request $request)
    {
        $businesses = Business::where('isActive', 1)->paginate(6);
        $count = Business::where('isActive', 1)->count();
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();
        return view('admin.listings-dashboard', [
            'user' => $request->user(),
            'categories' => $categories,
            'businesses' => $businesses,
            'count' => $count,
            'cities' => $cities,
            'galleries' => $galleries,
        ]);
    }
}
