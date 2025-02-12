<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        // Ajouter des suggestions pour chaque revue
        Suggestion::create([
            'content' => 'Consider adding more rest stops along the way.',
            'review_id' => 1, // Review ID 1 corresponds to the first review for The Grand Canyon Hike
        ]);

        Suggestion::create([
            'content' => 'Maybe provide more water stations along the trail.',
            'review_id' => 2, // Review ID 2 corresponds to the second review for the Appalachian Trail
        ]);

        Suggestion::create([
            'content' => 'Would be nice to have more shelters in case of sudden weather changes.',
            'review_id' => 3, // Review ID 3 corresponds to the third review for Everest Base Camp
        ]);

        // Ajouter des suggestions pour les autres revues
    }
}
