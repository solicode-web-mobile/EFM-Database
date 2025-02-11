<?php

namespace App\Http\Controllers;

use App\Models\SupportMotivation;
use App\Models\TypeMotivation;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SupportMotivationController extends Controller
{
    public function edit($id)
    {
        $supportMotivation = SupportMotivation::findOrFail($id);
        $typeMotivations = TypeMotivation::all();

        return view('support_motivations.edit', compact('supportMotivation', 'typeMotivations'));
    }

    public function update(Request $request, $id, ImageService $imageService)
    {
        $supportMotivation = SupportMotivation::findOrFail($id);

        $request->validate([
            'type_motivation_ids' => 'array|required',
        ]);

        $imageService->updateSupportMotivation($supportMotivation, $request->type_motivation_ids);

        return redirect()->route('images.index')->with('success', 'Motivation types updated successfully.');
    }
}
