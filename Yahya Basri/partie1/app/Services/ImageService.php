<?php

namespace App\Services;
use App\Models\Image;

class ImageService{
    public function getImageWithSupport(){
        Image::with(['employe','supportMotivation','typeMotivation'])->get();
    }

    public function incrementImageView(Image $image){
        $image->increment('view');
        $image->save();
    }

    public function incrementSupportView(Image $image){
        $image->supportMotivation->increment('view');
        $image->save();
    }
}
?>