<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gallery;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Get the search keyword, category, and city from the request
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category');
        $cityId = $request->input('city');
        $sortOrder = $request->input('sortOrder');

        // Query the listings based on the provided filters
        $businesses = Business::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($cityId, function ($query, $cityId) {
                $query->where('city_id', $cityId);
            })
            ->when($sortOrder, function ($query, $sortOrder) {
                if ($sortOrder === 'title_asc') {
                    $query->orderBy('title', 'asc');
                } elseif ($sortOrder === 'title_desc') {
                    $query->orderBy('title', 'desc');
                }
            })
            ->paginate(6); // Adjust the pagination limit as 10


        // Retrieve all categories and cities for the filter options

        $categories = Category::all();
        $cities = City::all();
        $galleries = Gallery::all();
        $count = Business::where('isActive', 1)->count();


        return view('app.listing', compact('businesses',  'categories', 'cities', 'galleries', 'count'));
    }
}
