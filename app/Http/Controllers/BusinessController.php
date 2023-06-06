<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BusinessRequest;
use App\Models\Business;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('app.add-listing', compact('categories', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(BusinessRequest $request)
    {
        // Validate the form data using the BusinessRequest class
        dd($request);
        $validatedData = $request->validated();

        // Move the uploaded logo file
        $logo_name = time() . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images/Business/'), $logo_name);
        $path = "images/Business/" . $logo_name;

        // Create a new Business instance
        $business = new Business();
        $business->user_id = $request->user()->id; // Use the authenticated user's ID
        $business->city_id = $validatedData['city_id'];
        $business->category_id = $validatedData['category_id'];
        $business->title = strip_tags($validatedData['title']);
        $business->description = strip_tags($validatedData['description']);
        $business->website = strip_tags($validatedData['website']);
        $business->address = strip_tags($validatedData['address']);
        $business->logo = $path; // Store the logo path

        $business->save();

        return redirect()->route('business.index');
    }



    // public function store(BusinessRequest $request)
    // {

    //     $request->user()->fill($request->validated());
    //     // if (Auth::check()) {
    //     //     $userId = Auth::id();
    //     //     return $userId;
    //     // }


    //     dd($request);




    //     $business = new User;
    //     $logo_name = time() . '.' . $request->logo->getClientOriginalExtension();
    //     $request->logo->move(public_path('images/Business/'), $logo_name);
    //     $path = "images/Business/" . $logo_name;
    //     $request->user()->logo = $path;

    //     $business->user_id = Auth::id();
    //     $business->city_id = $request->input('city_id');
    //     $business->category_id = $request->input('category_id');
    //     $business->title = strip_tags($request->input('title'));
    //     $business->description = strip_tags($request->input('description'));
    //     $business->website = strip_tags($request->input('website'));
    //     $business->address = strip_tags($request->input('address'));
    //     $business->save();

    //     // $table2 = new Gallery();
    //     // $table2->path = $request->input('column1');
    //     // $table2->save();





    //     // if ($request->has('images')) {
    //     //     foreach ($request->file('images') as $image) {
    //     //         $image_name = time() . '.' . $image->extension();
    //     //         $image->move(public_path('images/Business/'), $image_name);
    //     //         Gallery::create([
    //     //             'business_id' => '',
    //     //             'path' => $image_name,
    //     //             'type' => '',
    //     //         ]);
    //     //     }
    //     // }



    //     return redirect()->route('business.index');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
