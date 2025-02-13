<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hike;

class HikeSeeder extends Seeder
{
    public function run()
    {
        // Insert hikes (this code is fine)
        Hike::create([
            'title' => 'The Grand Canyon Hike',
            'description' => 'A spectacular hike through one of the world\'s most famous canyons, with breathtaking views.',
            'views' => 1200,
            'user_id' => 1, // Ensure user IDs exist in the database
            'image' => 'image1.jpg',
        ]);

        Hike::create([
            'title' => 'Mount Fuji Adventure',
            'description' => 'A challenging and rewarding hike to the summit of Japan\'s iconic Mount Fuji.',
            'views' => 800,
            'user_id' => 2, // Ensure user IDs exist in the database
            'image' => 'image2.jpg',
        ]);

        Hike::create([
            'title' => 'Rocky Mountain High',
            'description' => 'A majestic hike through the Rocky Mountains, filled with scenic views and diverse wildlife.',
            'views' => 1500,
            'user_id' => 1, // Ensure user IDs exist in the database
            'image' => 'image3.jpg',
        ]);

        Hike::create([
            'title' => 'Inca Trail to Machu Picchu',
            'description' => 'A historical and cultural hike leading to the ancient city of Machu Picchu in Peru.',
            'views' => 2000,
            'user_id' => 2, // Ensure user IDs exist in the database
            'image' => 'image4.jpg',
        ]);

        Hike::create([
            'title' => 'The Dolomites Traverse',
            'description' => 'An unforgettable journey through the stunning Dolomite mountain range in Italy.',
            'views' => 1100,
            'user_id' => 1, // Ensure user IDs exist in the database
            'image' => 'image5.jpg',
        ]);

        // Add more hikes as needed...
    }
}
