<?php

namespace App\Http\Controllers;

use App\Services\RandonneeService;

class RandonneeController extends Controller
{
    protected $randonneeService;

    public function __construct(RandonneeService $randonneeService)
    {
        $this->randonneeService = $randonneeService;
    }

    public function index()
    {
        $randonnees = $this->randonneeService->getRandonneesWithAvis();

        foreach ($randonnees as $randonnee) {
            $this->randonneeService->incrementRandonneeViews($randonnee);
            $this->randonneeService->incrementAvisViews($randonnee);
        }
        
        if ($randonnee->avis->where('note', '>=', 4)->count() > 10) {
            $randonnee->suggestion = "Randonnée Recommandée";
            $randonnee->save();
        }
        return view('randonnees.index', compact('randonnees'));
    }
}
