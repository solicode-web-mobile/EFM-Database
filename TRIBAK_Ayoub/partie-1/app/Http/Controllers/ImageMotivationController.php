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
        return view('images.index', compact('images'));
    }
}
