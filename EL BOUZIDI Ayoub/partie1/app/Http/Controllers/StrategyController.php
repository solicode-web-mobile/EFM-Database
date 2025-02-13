<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StrategySrevice;
class StrategyController extends Controller
{

    public function __construct(protected StrategySrevice $strategyService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strategies = $this->strategyService->getStrategiesWithAvis();
        foreach ($strategies as $strategy) {
            $this->strategyService->incrementStrategieViews($strategy);
            foreach($strategy->avie as $avie){
                $isValid = 0;
                foreach($avie->feedback as $feedback)
                {
                    if($feedback->feedbackType->id = 1) $isValid++;
                    if($isValid >= 10) $avie->valid = true;
                }
                $this->strategyService->incrementAvieViews($avie);
            }
        }
        return view('welcome', compact('strategies'));
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
