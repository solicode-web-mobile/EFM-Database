<?php

namespace App\Http\Controllers;

use App\Models\SupportMotivation;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SupportMotivationController extends Controller
{
    protected $imageService;

    // Injection du service via le constructeur
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    // Méthode update
    public function update(Request $request, $id)
    {
        // Récupération du message de soutien (instance unique)
        $support = SupportMotivation::findOrFail($id);

        // Validation
        $validatedData = $request->validate([
            'type_motivations' => 'required|array',
            'type_motivations.*' => 'exists:type_motivations,id', // Validation des IDs des types de motivation
        ]);

        // Appel CORRECT du service avec l'instance $support
        $this->imageService->updateSupportMotivation($support, $validatedData['type_motivations']);

        return redirect()->back()->with('success', 'Types mis à jour !');
    }

    public function edit($id)
    {
        // Récupère le message de soutien
        $support = SupportMotivation::findOrFail($id);
        
        // Récupère les types de motivation associés
        $typeMotivations = $support->typeMotivations; 
        
        return view('supports.edit', compact('support', 'typeMotivations'));
    }

    public function destroy($id)
    {
        // Trouver le message de soutien par son ID ou échouer si introuvable
        $support = SupportMotivation::findOrFail($id);

        // Supprimer le message de soutien
        $support->delete();

        // Retourner à la liste des messages avec un message de succès
        return redirect()->route('supports.index')->with('success', 'Le message de soutien a été supprimé avec succès.');
    }
}
