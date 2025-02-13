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
                'image_motivation_id' => 1, 
                'content' => 'Keep up the great work!',
                'views' => 0,
                'reactions' => 3,
            ],
            [
                'image_motivation_id' => 2,
                'content' => 'You are doing amazing!',
                'views' => 0,
                'reactions' => 2,
            ],
            [
                'image_motivation_id' => 3, 
                'content' => 'Keep pushing forward!',
                'views' => 0,
                'reactions' => 1,
            ],
            [
                'image_motivation_id' => 4, 
                'content' => 'You are an inspiration!',
                'views' => 0,
                'reactions' => 6,
            ],
        ];

        foreach ($supportMotivations as $supportMotivation) {
            SupportMotivation::create($supportMotivation);
        }
    }
}
