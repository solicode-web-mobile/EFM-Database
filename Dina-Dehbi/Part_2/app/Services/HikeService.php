<?php

namespace App\Services;

use App\Models\Hike;
use App\Models\Review;
use App\Models\Suggestion;

class HikeService
{
    public function getAllHikeRelation() {
        return Hike::with(['reviews.suggestions', 'reviews.user'])->get();
    }
    public function viewHikeIncrement(Hike $hike){
        $hike->increment('views'); 
    }
    public function viewReviewsIncrement(Hike $hike){
        foreach($hike->reviews as $review){
            $review->increment('views');
        }
    }
    public function checkIfReviewsRecommended(Hike $hike){
        $reviewsCount = $hike->reviews->count();
        return $reviewsCount > 10;
    }
    
    public function updateReviewSuggestions(Review $review, array $suggestionsIds)
    {
        $review->suggestions()->delete();
            foreach ($suggestionsIds as $content) {
            $review->suggestions()->create([
                'content' => $content
            ]);
        }
    }

   


   
}
