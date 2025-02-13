<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\User;
use App\Models\Hike;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks before truncating tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the necessary tables (be careful with users)
        DB::table('reviews')->truncate(); // Only truncate the reviews table
        DB::table('users')->truncate();   // Ensure this does not conflict with foreign keys
        DB::table('hikes')->truncate();   // Make sure hikes are also cleared if needed

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert users
        $user1 = User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
        ]);

        // Insert hikes
        $hike1 = Hike::create([
            'title' => 'Appalachian Trail',
            'description' => 'A challenging yet rewarding hike',
            'views' => 1000,
            'image' => 'appalachian_trail.jpg',
            'user_id' => $user1->id,
        ]);

        // Insert 15 reviews for the first hike to ensure there are more than 10
        foreach (range(1, 15) as $i) {
            Review::create([
                'content' => "Review $i: Incredible experience on the Appalachian Trail!",
                'views' => 100 + $i,  // Sample views increment
                'hike_id' => $hike1->id,
                'user_id' => $i % 2 == 0 ? $user1->id : $user2->id,  // Alternate users for variety
            ]);
        }

        // Insert another hike with reviews (optional)
        $hike2 = Hike::create([
            'title' => 'Mount Everest Base Camp',
            'description' => 'The ultimate mountain trek',
            'views' => 2000,
            'image' => 'everest_base_camp.jpg',
            'user_id' => $user2->id,
        ]);

        // Insert some reviews for this second hike
        Review::create([
            'content' => 'Tough but rewarding, the Everest Base Camp hike was unforgettable.',
            'views' => 200,
            'hike_id' => $hike2->id,
            'user_id' => $user1->id,
        ]);

        Review::create([
            'content' => 'A life-changing journey through the Himalayas.',
            'views' => 300,
            'hike_id' => $hike2->id,
            'user_id' => $user2->id,
        ]);
    }
}
