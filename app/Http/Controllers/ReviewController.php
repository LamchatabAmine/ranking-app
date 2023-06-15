<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $business_id)
    {
        // dd($request);
        // Validate the form data using the BusinessRequest class
        $validated = $request->validate([
            'message' => 'required',
            'score',
        ]);

        // Create a new Review instance
        $review = new Review();
        $review->user_id = $request->user()->id; // Use the authenticated user's ID
        $review->business_id = $business_id; // Use business_id from route
        $review->message = $validated['message'];
        $review->score = $request->input('score');

        $review->save();


        return back()->with('success', 'Review Added successfully');
    }
}
