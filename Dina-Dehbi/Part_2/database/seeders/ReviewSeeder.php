<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Hike;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Create or get existing users
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
        $hike1 = Hike::firstOrCreate([
            'title' => 'The Grand Canyon Hike',
            'description' => 'A spectacular hike...',
            'views' => 1200,
            'user_id' => $user1->id,
            'image' => 'image1.jpg',
        ]);

        $hike2 = Hike::firstOrCreate([
            'title' => 'Appalachian Trail',
            'description' => 'A long-distance hike...',
            'views' => 1500,
            'user_id' => $user2->id,
            'image' => 'image2.jpg',
        ]);

        // Add reviews
        Review::create([
            'content' => 'Incredible views...',
            'views' => 200,
            'hike_id' => $hike1->id,
            'user_id' => $user1->id,
        ]);

        Review::create([
            'content' => 'Tough but rewarding...',
            'views' => 300,
            'hike_id' => $hike2->id,
            'user_id' => $user2->id,
        ]);
    }
}
