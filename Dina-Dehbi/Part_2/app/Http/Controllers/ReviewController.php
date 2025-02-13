<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Suggestion;
use App\Services\HikeService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $hikeService;

    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    }

    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }


    public function edit($id)
    {
        $review = Review::with('suggestions')->findOrFail($id); // Load review with suggestions
        $suggestions = Suggestion::all(); // Get all suggestions
    
        return view('reviews.edit', compact('review', 'suggestions'));
    }
    

    public function update(Request $request, $id)
{
    $review = Review::findOrFail($id);
    $review->update([
        'content' => $request->description,
        'views' => $request->views,
    ]);

    if ($request->has('suggestions')) {
        foreach ($request->suggestions as $suggestionId => $newContent) {
            $suggestion = Suggestion::find($suggestionId);
            if ($suggestion) {
                $suggestion->update([
                    'content' => $newContent, 
                ]);
            }
        }
    }

    return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
}



    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }

    public function show($id)
    {
        $review = Review::with('suggestions')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

}
