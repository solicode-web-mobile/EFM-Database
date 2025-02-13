<?php

namespace App\Services;

use App\Models\Hike;

class HikeService
{
    public function getAllHikeRelation(){
        return Hike::with(['reviews.suggetions','reviews.user'])->get();
    }

    public function HikeViewIncrement(Hike $hike){
        $hike->increment('views');
    }
    public function ReviewViewIncrement(Hike $hikes){
        foreach($hikes->reviews as $review){
           $review->increment('views');
        }
    }
}
