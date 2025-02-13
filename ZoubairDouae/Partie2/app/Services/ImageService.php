<?php

namespace App\Services;

use App\Models\ImageMotivation;
use App\Models\SupportMotivation;

class ImageService
{
    public function getImagesWithSupport()
    {
        return ImageMotivation::with(['employe', 'supportMotivations.typeMotivations'])->get();

    }

    public function incrementImageViews(ImageMotivation $image)
    {
        $image->increment('views');


    }

    public function incrementSupportViews(ImageMotivation $image)
    {
        foreach ($image->supportMotivations as $support) {
            $support->increment('views');
        }
    }

    public function updateSupportMotivation(SupportMotivation $support, array $typeMotivationIds){

        $support->typeMotivations()->sync($typeMotivationIds);

    }


    public function getImagesWithAverageCheck(){

        $images = ImageMotivation::with(['employe', 'supportMotivation', 'supportMotivation.typeMotivation'])->get();

        $averageViews = ImageMotivation::avg('views');

        foreach ($images as $image) {

            if ($image->views > $averageViews) {
                
                $image->above_average = true; 

            }else {

                $image->above_average = false; 
        }
    }

    return [
        'images' => $images,
        'averageViews' => $averageViews
    ];
}







 
}