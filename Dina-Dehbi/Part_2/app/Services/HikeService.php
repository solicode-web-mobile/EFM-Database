<?php

namespace App\Services;

use App\Models\Hike;
use App\Models\Review;

class HikeService
{
    public function getAllHikeRelation()
    {
        return Hike::with(['reviews.suggestions', 'reviews.user', 'user'])->get();
    }

    public function incrementHikeViews(Hike $hike)
    {
        $hike->increment('views');
    }

    public function incrementReviewViews(Hike $hike)
    {
        foreach ($hike->reviews as $review) {
            $review->increment('views');
        }
    }

    public function checkIfReviewsRecommended(Hike $hike)
    {
        return $hike->reviews->count() > 10;
    }

    public function updateReviewSuggestions(Review $review, array $suggestionsIds)
    {
        $review->suggestions()->sync($suggestionsIds);
    }

    public function checkIfPopular(Hike $hike)
    {
        $averageViews = Hike::avg('views');
        return $hike->views > $averageViews; 
    }

    public function getHikesWithPopularity()
    {
        $hikes = $this->getAllHikeRelation();
        foreach ($hikes as $hike) {
            $hike->isPopular = $this->checkIfPopular($hike); 
            $hike->isRecommended = $this->checkIfReviewsRecommended($hike);  
        }
        return $hikes;
    }
}
