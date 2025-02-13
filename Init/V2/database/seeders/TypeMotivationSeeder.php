<?php

namespace Database\Seeders;

use App\Models\TypeMotivation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesOfMotivation = [
            ['name' => 'Encouragement'],
            ['name' => 'Inspiration'],
            ['name' => 'Motivation'],
        ];

        foreach ($typesOfMotivation as $type) {
            TypeMotivation::create($type);
        }
    }
}
