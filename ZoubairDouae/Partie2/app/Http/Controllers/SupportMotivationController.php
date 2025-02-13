<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportMotivationController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    
    public function edit($id){

        $support = SupportMotivation::findOrFail($id);
        $typesMotivation = TypeMotivation::all(); 

        return view('images.edit', compact('support', 'typesMotivation'));
    }

    public function update(Request $request, $id, ImageService $imageService)
{
    $support = SupportMotivation::findOrFail($id);
    
    
    $request->validate([
        'type_motivation_id' => 'required|array',
        'type_motivation_id.*' => 'exists:type_motivations,id'
    ]);

    
    $imageService->updateSupportMotivation($support, $request->type_motivation_ids);

    return redirect()->route('images.index')->with('success', 'Types de motivation mis à jour avec succès.');
}


public function destroy($id)
{
    $support = SupportMotivation::findOrFail($id);
    $support->delete();

    return redirect()->route('images.index')->with('success', 'Message de soutien supprimé avec succès.');
}

}
