<?php

namespace App\Http\Controllers;

use App\Models\TypeMotivation;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageMotivationController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $images = $this->imageService->getImagesWithSupport();

        foreach ($images as $image) {
            $this->imageService->incrementImageViews($image);
            $this->imageService->incrementSupportViews($image);

            foreach ($image->supportMotivations as $support) {
                if ($support->reaction > 5 && !$support->typeMotivations->contains('name', 'Encouragement')) {
                    $typeMotivation = new TypeMotivation(['name' => 'Encouragement']); 
                    $support->typeMotivations->push($typeMotivation);               
                 }
            }
        }

        // return view('images.index', compact('images'));

        $data = $this->imageService->getImagesWithAverageCheck();
    
        return view('images.index', [
            'images' => $data['images'],
            'averageViews' => $data['averageViews']
        ]);

 
    }

    public function updateSupportMotivation(SupportMotivation $support, array $typeMotivationIds)
{
    
    $support->typeMotivations()->sync($typeMotivationIds);
}




    

}
