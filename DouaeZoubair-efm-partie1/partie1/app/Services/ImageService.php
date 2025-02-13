<?php
namespace App\Services;

use App\Models\ImageMotivation;

class ImageService 
{
    public function getImagesWithSupport(){

        return ImageMotivation::with(['employe' , 'supportMotivation.typeMotivation'])->get();
    }

    public function incrementImageViews(ImageMotivation $image){
        return $image->increment('views');

    }

    public function incrementSupportViews(ImageMotivation $image){

        foreach ($image->supportMotivation as $support) {
            $support->increment('views');
        }
    }

}