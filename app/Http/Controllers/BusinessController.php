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
use App\Models\Review;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('business.add-listing', compact('categories', 'cities'))->with('success', 'business Added successfully');
    }


    // public function sort(Request $request, $business_id)
    // {
    //     // $sortOrder = $request->input('sortOrder');
    //     // dd($business_id);
    //     // Perform the sorting based on the selected option
    //     if ($business_id === 'Ascending') {
    //         // Sort the listing in ascending order
    //         $businesses = Business::orderBy('created_at', 'asc')->paginate(5);
    //     } elseif ($business_id === 'Descending') {
    //         // Sort the listing in descending order
    //         $businesses = Business::orderBy('created_at', 'desc')->paginate(5);
    //     } else {
    //         $businesses = Business::paginate(5);
    //     }

    //     $galleries = Gallery::all(); // Assuming you have a Gallery model
    //     $categories = Category::all(); // Assuming you have a Category model
    //     $cities = City::all();
    //     // response()->json($business)
    //     return view('app.listing', compact('businesses', 'galleries', 'categories', 'cities'));
    // }



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
        $validatedData = $request->validated();

        // Move the uploaded logo file
        $logo_name = time() . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images/Business/'), $logo_name);
        $path = "images/Business/" . $logo_name;

        // Create a new Business instance
        $business = new Business();
        $business->user_id = $request->user()->id; // Use the authenticated user's ID
        $business->city_id = $validatedData['city'];
        $business->category_id = $validatedData['category'];
        $business->title = strip_tags($validatedData['title']);
        $business->phone = strip_tags($validatedData['phone']);
        $business->description = strip_tags($validatedData['description']);
        $business->website = strip_tags($validatedData['website']);
        $business->address = strip_tags($validatedData['address']);
        $business->logo = $path; // Store the logo path
        $business->save();

        $business_id = Business::latest('id')->value('id');

        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $key  => $file) {
                $gallery = new Gallery();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_name = random_int(100, 100000) . time() . '.' . $ext;
                $upload_path = 'images/business/gallery/';
                $file->move($upload_path, $image_name);
                $gallery->path = $upload_path . $image_name;
                $gallery->business_id = $business_id;
                $gallery->type = ($key === 0) ? 1 : 0;
                $images[] = $gallery->path;

                $gallery->save();
            }
        }

        return redirect()->route('business.detail', $business_id)->with('success', 'business Updated successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();
        $users = User::all();
        $review = Review::all();
        return view('business.listing-details', [
            'business' => Business::findOrFail($id),
            'categories' => $categories,
            'cities' => $cities,
            'galleries' => $galleries,
            'users' => $users,
            'review' => $review,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Business $business)
    {

        $this->authorize('update-business', $business);

        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();


        return view('business.edit', [
            'business' => Business::findOrFail($business->id),
            'categories' => $categories,
            'cities' => $cities,
            'galleries' => $galleries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business)
    {
        // $this->user()->can('update-business', Business::findOrFail($this->id));
        $this->authorize('update-business', $business);
        // Validate the form data using the BusinessRequest class
        $validatedData = $request->validated();
        // Move the uploaded logo file
        $logo_name = time() . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images/Business/'), $logo_name);
        $path = "images/Business/" . $logo_name;

        // Create a new Business instance
        $business = Business::findOrFail($business->id);

        $business->user_id = $request->user()->id; // Use the authenticated user's ID
        $business->city_id = $validatedData['city'];
        $business->category_id = $validatedData['category'];
        $business->title = strip_tags($validatedData['title']);
        $business->phone = strip_tags($validatedData['phone']);
        $business->description = strip_tags($validatedData['description']);
        $business->website = strip_tags($validatedData['website']);
        $business->address = strip_tags($validatedData['address']);
        $business->logo = $path; // Store the logo path
        $business->save();

        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $key  => $file) {
                $gallery = new Gallery();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_name = random_int(100, 100000) . time() . '.' . $ext;
                $upload_path = 'images/business/gallery/';
                $file->move($upload_path, $image_name);
                $gallery->path = $upload_path . $image_name;
                $gallery->business_id = $business->id;
                $gallery->type = ($key === 0) ? 1 : 0;
                $images[] = $gallery->path;

                $gallery->save();
            }
        }

        return redirect()->route('business.detail', $business->id)->with('success', 'business Updated successfully');
    }

    public function removeImage(string $id)
    {
        $image = Gallery::findOrFail($id);

        if (!$image) abort(404);

        unlink(public_path($image->path));

        $image->delete();

        return back()->with('success', 'image deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $DeleteBusiness = Business::findOrFail($id);
        $business_id = $DeleteBusiness->id;
        $DeleteBusiness->delete();

        $DeleteGallery = Gallery::where('business_id', $business_id);
        $DeleteGallery->delete();


        return back()->with('success', 'business deleted successfully');
    }

    public function confirmChange($id)
    {
        $business = Business::findOrFail($id);
        $business->isActive = 1;
        $business->save();

        // You can add any additional logic or redirect the user as needed

        return redirect()->back()->with('success', 'Business change confirmed successfully.');
    }
}
