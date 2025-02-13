<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
use SebastianBergmann\Type\VoidType;

class ImageController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService){
        $this->imageService = $imageService;
    }
    public function index(){
        $image = $this->imageService->getImageWithSupport();

        return view('index',compact('image'));
    }
}
