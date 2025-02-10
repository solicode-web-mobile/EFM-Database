<?php
namespace App\Services;

use App\Models\ImageMotivation;

class ImageService 
{
    public function getImagesWithSupport(){
        return ImageMotivation::with(['employes', 'support_motivations', 'type_motivations'])->get();
    }
}