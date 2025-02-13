<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RandonneeService;
use App\Models\Randonnee;

class RandonneeController extends Controller
{
    protected $randonneeService;

    public function __construct(RandonneeService $randonneeService)
    {
        $this->randonneeService = $randonneeService;
    }

    public function index()
    {
        $randonnées = $this->randonneeService->getRandonneesWithAvis();

        foreach ($randonnées as $randonnee) {
            $this->randonneeService->incrementRandonneeViews($randonnee);
            $this->randonneeService->incrementAvisViews($randonnee);
            $this->randonneeService->checkAndAddRecommendation($randonnee);
        }

        return view('randonnees.index', compact('randonnées'));
    }
}
