<?php

namespace Database\Seeders;

use App\Models\Hike;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        // Ajout de randonnées (hikes)
        $hike1 = Hike::firstOrCreate([
            'title' => 'The Grand Canyon Hike',
            'description' => 'A spectacular hike through one of the world\'s most famous canyons, with breathtaking views.',
            'views' => 1200,
            'user_id' => 1,
            'image' => 'image1.jpg',
        ]);

        $hike2 = Hike::firstOrCreate([
            'title' => 'Appalachian Trail',
            'description' => 'A long-distance hike across the eastern United States, known for its diverse landscapes.',
            'views' => 1500,
            'user_id' => 2,
            'image' => 'image2.jpg',
        ]);

        // Ajouter des critiques (reviews) après les randonnées
        $review1 = Review::create([
            'content' => 'Incredible views at every turn, a truly unforgettable experience!',
            'views' => 200,
            'hike_id' => $hike1->id, // Assurez-vous que hike_id est valide
            'user_id' => 1,
        ]);

        $review2 = Review::create([
            'content' => 'Tough but rewarding, the Appalachian Trail offers a real challenge!',
            'views' => 300,
            'hike_id' => $hike2->id, // Assurez-vous que hike_id est valide
            'user_id' => 2,
        ]);

        // Ajout des suggestions pour les critiques
        Suggestion::create([
            'suggestion_id' => 1,
            'content' => 'Consider adding more rest stops along the way.',
            'review_id' => $review1->id, // Assurez-vous que review_id est valide
        ]);

        Suggestion::create([
            'suggestion_id' => 2,
            'content' => 'Provide more detailed maps at the start of the trail.',
            'review_id' => $review2->id, // Assurez-vous que review_id est valide
        ]);

        // Additional suggestions
        Suggestion::create([
            'suggestion_id' => 3,
            'content' => 'Provide more information about the wildlife along the trail.',
            'review_id' => $review1->id,
        ]);

        Suggestion::create([
            'suggestion_id' => 4,
            'content' => 'Add more signage to help hikers navigate the trail more easily.',
            'review_id' => $review2->id,
        ]);

        Suggestion::create([
            'suggestion_id' => 5,
            'content' => 'Include recommendations for best times to visit based on weather conditions.',
            'review_id' => $review1->id,
        ]);

        Suggestion::create([
            'suggestion_id' => 6,
            'content' => 'Offer more rest areas with benches and water stations along the trail.',
            'review_id' => $review2->id,
        ]);
    }
}
