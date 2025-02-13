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
        return view('randonnees.index', compact('randonnees'));
    }
}
