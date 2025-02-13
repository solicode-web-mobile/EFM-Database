<?php

namespace App\Services;

use App\Models\Hike;

class HikeService
{

    protected $hike;
    public function __construct(Hike $hike)
    {
        $this->hike = $hike;
    }


    // 
    public function getHikesWithReviews()
    {
        return Hike::with(['user', 'reviews.suggestions'])->get();
    }
  
    public function incrementHikeViews(Hike $hike)
    {
        $hike->increment('views');
    }
    
   
    // public function incrementReviewViews(Hike $hike)
   
    
   
}
