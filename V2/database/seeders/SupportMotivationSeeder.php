<?php

namespace Database\Seeders;

use App\Models\SupportMotivation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportMotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supportMotivations = [
            [
                'image_id' => 1, 
                'message' => 'Keep up the great work!',
                'views' => 0,
                'reactions' => 3,
            ],
            [
                'image_id' => 2,
                'message' => 'You are doing amazing!',
                'views' => 0,
                'reactions' => 2,
            ],
            [
                'image_id' => 3, 
                'message' => 'Keep pushing forward!',
                'views' => 0,
                'reactions' => 1,
            ],
            [
                'image_id' => 4, 
                'message' => 'You are an inspiration!',
                'views' => 0,
                'reactions' => 6,
            ],
        ];

        foreach ($supportMotivations as $supportMotivation) {
            SupportMotivation::create($supportMotivation);
        }
    }
}
