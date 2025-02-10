<?php

namespace Database\Seeders;

use App\Models\ImageMotivation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageMotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'employe_id' => 1, 
                'url' => 'https://example.com/images/john_image.jpg',
                'views' => 0,
            ],
            [
                'employe_id' => 2, 
                'url' => 'https://example.com/images/jane_image.jpg',
                'views' => 0,
            ],
            [
                'employe_id' => 3,
                'url' => 'https://example.com/images/robert_image.jpg',
                'views' => 0,
            ],
            [
                'employe_id' => 4, 
                'url' => 'https://example.com/images/charlie_image.jpg',
                'views' => 0,
            ],
        ];

        foreach($images as $image){
            ImageMotivation::create($image);
        }
    }
}
