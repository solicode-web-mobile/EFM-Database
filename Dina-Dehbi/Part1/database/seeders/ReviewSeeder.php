<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Ajouter 3 avis pour chaque randonnée
        Review::create([
            'content' => 'Incredible views at every turn, a truly unforgettable experience!',
            'views' => 200,
            'hike_id' => 1, // Hike ID 1 corresponds to The Grand Canyon Hike
            'user_id' => 1,
        ]);

        Review::create([
            'content' => 'Tough but rewarding, the Appalachian Trail offers a real challenge!',
            'views' => 300,
            'hike_id' => 2, // Hike ID 2 corresponds to the Appalachian Trail
            'user_id' => 2,
        ]);

        Review::create([
            'content' => 'The trek to Everest Base Camp was a dream come true, but the altitude was difficult.',
            'views' => 250,
            'hike_id' => 3, // Hike ID 3 corresponds to Everest Base Camp
            'user_id' => 3,
        ]);

        // Ajouter des avis pour les autres randonnées de manière réaliste
    }
}
