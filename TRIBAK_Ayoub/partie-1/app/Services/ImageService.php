<?php
namespace App\Services;

use App\Models\ImageMotivation;

class ImageService 
{
    public function getImagesWithSupport(){
        return ImageMotivation::with('employes', 'supportMotivation.typeMotivation')->get();
    }
}