<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageMotivationController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        return $this->imageService = $imageService;
    }

    public function index()
    {
        $images = $this->imageService->getImagesWithSupport();
        return view('images.index', compact('images'));
    }
}
