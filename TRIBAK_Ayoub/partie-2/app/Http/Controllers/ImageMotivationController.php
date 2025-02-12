<?php

namespace App\Http\Controllers;

use App\Models\ImageMotivation;
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


            foreach ($image->supportMotivations as $support) {
                if ($support->reactions > 5 && !$support->typeMotivations->contains('name', 'Encouragement')) {
                    $typeMotivation = new TypeMotivation(['name' => 'Encouragement']);
                    $support->typeMotivations->push($typeMotivation);
                }
            }
        }

        return view('images.index', compact('images'));
    }

    public function show($id)
    {
        $image = ImageMotivation::findOrFail($id);
        $this->imageService->incrementImageViews($image);
        $this->imageService->incrementSupportViews($image);
        return view('images.show', compact('image'));
    }
}
