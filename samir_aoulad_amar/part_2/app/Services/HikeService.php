<?php

namespace App\Services;

use App\Models\Hike;
use App\Models\Review;
use App\Models\Suggestion;



class HikeService
{

    public function getHikesWithReviews()
    {
        return Hike::with(['user', 'reviews.suggestions'])->get();
    }
    public function getReviewsWithSuggestions($id)
    {
        return Review::with('suggestions')->findOrFail($id);
    }

    public function all()
    {
        return Suggestion::all();
    }
    public function findOrFail($id)
    {
        return Review::findOrFail($id);
    }

    public function incrementHikeViews(Hike $hike)
    {
        $hike->increment('views');
    }

    public function incrementReviewViews(Hike $hike)
    {
        foreach ($hike->reviews as $review) {
            $review->increment('views');
            foreach ($review->suggestions as $suggestion) {
                $suggestion->increment('views');
            }
        }
    }

    public function incrementSingleReviewView(Review $review)
    {
        $review->increment('views');
        foreach ($review->suggestions as $suggestion) {
            $suggestion->increment('views');
        }
    }


    public function updateReviewSuggestions(Review $review, array $suggestionIds)
    {
        $review->suggestions()->sync($suggestionIds);
    }
}
