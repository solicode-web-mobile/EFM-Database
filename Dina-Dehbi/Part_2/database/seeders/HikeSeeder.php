<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hike;
use App\Models\User;

class HikeSeeder extends Seeder
{
    public function run()
    {
        // Create or get existing users by email
        $user1 = User::firstOrCreate([
            'email' => 'user1@example.com'
        ], [
            'name' => 'User 1',
            'password' => bcrypt('password')
        ]);

        $user2 = User::firstOrCreate([
            'email' => 'user2@example.com'
        ], [
            'name' => 'User 2',
            'password' => bcrypt('password')
        ]);

        // Add hikes
        Hike::create([
            'title' => 'The Grand Canyon Hike',
            'description' => 'A spectacular hike through one of the world\'s most famous canyons, with breathtaking views.',
            'views' => 1200,
            'user_id' => $user1->id,
            'image' => 'image1.jpg',
        ]);

        Hike::create([
            'title' => 'Appalachian Trail',
            'description' => 'A long-distance hike across the eastern United States, known for its diverse landscapes.',
            'views' => 1500,
            'user_id' => $user2->id,
            'image' => 'image2.jpg',
        ]);

        Hike::create([
            'title' => 'Mount Everest Base Camp',
            'description' => 'A popular trek to the base camp of the world\'s highest peak, offering stunning views of the Himalayas.',
            'views' => 1800,
            'user_id' => $user1->id,
            'image' => 'image3.jpg',
        ]);

        // More hikes...
        Hike::create([
            'title' => 'Mount Fuji Climb',
            'description' => 'A challenging yet rewarding hike to the summit of Japan\'s most iconic mountain.',
            'views' => 800,
            'user_id' => $user2->id,
            'image' => 'image4.jpg',
        ]);
    }
}
