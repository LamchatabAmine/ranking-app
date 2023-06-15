<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileUpdateRequest;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', 2)->count();
        $businesses = Business::where('isActive', 1)->paginate(6);
        $CountBusinesses = Business::where('isActive', 1)->count();
        $categories = Category::count();
        $cities = City::count();
        return view('admin.dashboard', [
            'user' => $request->user(),
            'CountUsers' => $users,
            'CountCategories' => $categories,
            'Businesses' => $businesses,
            'CountBusinesses' => $CountBusinesses,
            'CountCities' => $cities,
        ]);
    }

    public function listings(Request $request)
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


    public function profile(Request $request)
    {
        return view('admin.profile', [
            'user' => $request->user(),
        ]);
    }



    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $image_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/userProfile/'), $image_name);
        $path = "images/userProfile/" . $image_name;
        $request->user()->image = $path;

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();


        return back()->with('success', 'Update was successfully!');
    }

    public function addUser(Request $request)
    {
        return view('admin.addUser', [
            'user' => $request->user(),
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class)],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => 'required'
        ]);

        // Create a new Business instance
        $user = new User();
        $user->fullName = $validatedData['fullName'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();


        return back()->with('success', 'User as added successfully');
    }
}
