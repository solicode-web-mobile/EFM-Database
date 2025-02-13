<?php

namespace App\Services;

use App\Models\Randonnee;
use App\Models\Avis;
use App\Models\Suggestion;

class RandonneeService
{
    // Retrieve all hikes with their related data
    public function getRandonneesWithAvis()
    {
        return Randonnee::with(['member', 'avis.suggestions'])->get();
    }

    // Increment views for a hike
    public function incrementRandonneeViews(Randonnee $randonnee)
    {
        $randonnee->increment('views');
    }

    // Increment views for all reviews of a hike
    public function incrementAvisViews(Randonnee $randonnee)
    {
        foreach ($randonnee->avis as $avis) {
            $avis->increment('views');
        }
    }

    // Automatically add "Randonnée Recommandée" if a hike has more than 10 positive reviews
    public function checkAndAddRecommendation(Randonnee $randonnee)
    {
        $positiveAvisCount = $randonnee->avis()->count();

        if ($positiveAvisCount > 10) {
            $recommendation = Suggestion::firstOrCreate(['content' => 'Randonnée Recommandée']);
            foreach ($randonnee->avis as $avis) {
                if (!$avis->suggestions->contains($recommendation->id)) {
                    $avis->suggestions()->attach($recommendation->id);
                }
            }
        }
    }


    public function updateAvisSuggestions(Avis $avis, array $suggestionsIds)
    {
        // Sync the suggestions for this review
        $avis->suggestions()->sync($suggestionsIds);
    }
}
