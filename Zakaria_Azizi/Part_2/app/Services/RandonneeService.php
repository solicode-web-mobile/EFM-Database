<?php

namespace App\Services;

use App\Models\Randonnee;

class RandonneeService
{
    public function checkAndAssignRecommendation(Randonnee $randonnee)
    {
        $nombreAvisPositifs = $randonnee->avis()->where('positif', '>=',     1)->count();
        if ($nombreAvisPositifs >= 10) {
            $randonnee->update(['suggestion' => 'Randonnée Recommandée']);
        }
    }
    
    public function getRandonneesWithAvis()
    {
        return Randonnee::with(['membre', 'avis.suggestions'])->get();
    }

    public function incrementRandonneeViews(Randonnee $randonnee)
    {
        $randonnee->increment('vues');
    }

    public function incrementAvisViews(Randonnee $randonnee)
    {
        foreach ($randonnee->avis as $avis) {
            $avis->increment('vues');
        }
    }
}
