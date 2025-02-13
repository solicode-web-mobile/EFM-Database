<?php

namespace App\Http\Controllers;

use App\Services\HikeService;
use App\Models\Hike;
use Database\Seeders\HikeSeeder;
use Illuminate\Http\Request;

class HikeController extends Controller
{
   protected $hikeService;
   public function __construct(HikeService $hikeService)
   {
        $this->hikeService = $hikeService;
   }

   public function index(){
        $hikes = $this->hikeService->getAllHikeRelation();
        return view('home', compact('hikes'));
   }
}
