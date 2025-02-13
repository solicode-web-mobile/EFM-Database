<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hike;
use App\Models\Review;
use App\Models\Suggestion;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Création des utilisateurs avec firstOrCreate pour éviter les doublons
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

        // Création de randonnées
        $hike1 = Hike::firstOrCreate([
            'title' => 'The Grand Canyon Hike'
        ], [
            'description' => 'A spectacular hike through one of the world\'s most famous canyons, with breathtaking views.',
            'views' => 1200,
            'user_id' => $user1->id,
            'image' => 'image1.jpg',
        ]);

        // Création de critiques
        $review1 = Review::firstOrCreate([
            'hike_id' => $hike1->id,
            'user_id' => $user1->id,
        ], [
            'content' => 'Incredible views at every turn!',
            'views' => 200,
        ]);

        // Création de suggestions pour les critiques
        Suggestion::firstOrCreate([
            'review_id' => $review1->id
        ], [
            'content' => 'Consider adding more rest stops along the way.',
        ]);
    }
}
