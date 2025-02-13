<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy data into the reviews table
        Review::create([
            'content' => 'Amazing experience! The hike was challenging .',
            'views' => '200',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 1 exists
            // Assuming hike with ID 1 exists
        ]);

        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'Amazing experience! The hike was challenging .',
            'views' => '200',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 1 exists
            // Assuming hike with ID 1 exists
        ]);

        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 1,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'A great trail for beginners. Beautiful scenery all around.',
            'views' => '300',
            'hike_id' => 2,
            'user_id' => 2, // Assuming hike with ID 3 exists
            // Assuming hike with ID 3 exists
        ]);

        Review::create([
            'content' => 'Amazing experience! The hike was challenging .',
            'views' => '200',
            'hike_id' => 4,
            'user_id' => 2, // Assuming hike with ID 1 exists
            // Assuming hike with ID 1 exists
        ]);

        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'Amazing experience! The hike was challenging .',
            'views' => '200',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 1 exists
            // Assuming hike with ID 1 exists
        ]);

        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'It was too difficult, and I didn\'t enjoy the hike.',
            'views' => '50',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 2 exists
            // Assuming hike with ID 2 exists
        ]);
        Review::create([
            'content' => 'A great trail for beginners. Beautiful scenery all around.',
            'views' => '300',
            'hike_id' => 3,
            'user_id' => 2, // Assuming hike with ID 3 exists
            // Assuming hike with ID 3 exists
        ]);
    }
}
