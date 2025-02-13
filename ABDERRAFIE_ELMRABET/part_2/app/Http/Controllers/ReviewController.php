<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }
    public function incrementViews(Review $review)
    {
        $this->reviewService->incrementReviewViews($review);
        return back();
    }

    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        return view('hikes.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // Loop through suggestions and update each one
        foreach ($request->input('suggestions', []) as $suggestionId => $content) {
            $suggestion = Suggestion::find($suggestionId);
            if ($suggestion) {
                $suggestion->content = $content;
                $suggestion->save();
            }
        }

        return redirect()->route('hikes.show', $review->hike->id)
            ->with('success', 'Suggestions updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();  // This will automatically delete related suggestions
        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}
