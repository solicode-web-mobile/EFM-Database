<?php

namespace App\Http\Controllers;

use App\Services\StrategieService;
use Illuminate\Http\Request;

class StrategiesController extends Controller
{

    public function __construct(protected StrategieService $strategieService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strategies = $this->strategieService->getStrategiesWithAvis();
        foreach ($strategies as $strategy) {
            $this->strategieService->incrementStrategieViews($strategy);
            foreach($strategy->avie as $avie){
                $isValid = 0;
                foreach($avie->feedback as $feedback)
                {
                    if($feedback->feedbackType->id = 1) $isValid++;
                    if($isValid >= 10) $avie->valid = true;
                }
            }
        }
        return view('index', compact('strategies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
