<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hike;

class HikeSeeder extends Seeder
{
    public function run()
    {
        // Insérer 10 randonnées réelles
        Hike::create([
            'title' => 'The Grand Canyon Hike',
            'description' => 'A spectacular hike through one of the world\'s most famous canyons, with breathtaking views.',
            'views' => 1200,
            'user_id' => 1,
            'image' => 'image1.jpg',
        ]);

        Hike::create([
            'title' => 'Appalachian Trail',
            'description' => 'A long-distance hike across the eastern United States, known for its diverse landscapes.',
            'views' => 1500,
            'user_id' => 2,
            'image' => 'image2.jpg',
        ]);

        Hike::create([
            'title' => 'Mount Everest Base Camp',
            'description' => 'A popular trek to the base camp of the world\'s highest peak, offering stunning views of the Himalayas.',
            'views' => 1800,
            'user_id' => 3,
            'image' => 'image3.jpg',
        ]);

        // Ajouter 7 autres randonnées avec des titres et descriptions réalistes
        Hike::create([
            'title' => 'Mount Fuji Climb',
            'description' => 'A challenging yet rewarding hike to the summit of Japan\'s most iconic mountain.',
            'views' => 800,
            'user_id' => 1,
            'image' => 'image1.jpg',
        ]);

        Hike::create([
            'title' => 'Inca Trail to Machu Picchu',
            'description' => 'Hike through ancient Incan ruins and end at the majestic Machu Picchu.',
            'views' => 900,
            'user_id' => 2,
            'image' => 'image2.jpg',
        ]);

        // Continue for 5 more hikes with real-world themes and descriptions...
    }
}
