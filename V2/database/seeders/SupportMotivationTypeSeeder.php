<?php

namespace Database\Seeders;

use App\Models\SupportMotivationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportMotivationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supportMotivationTypes = [
            ['support_motivation_id' => 1, 'type_motivation_id' => 1], 
            ['support_motivation_id' => 2, 'type_motivation_id' => 2], 
            ['support_motivation_id' => 3, 'type_motivation_id' => 3], 
            ['support_motivation_id' => 4, 'type_motivation_id' => 1], 
            ['support_motivation_id' => 4, 'type_motivation_id' => 2], 
        ];

        foreach ($supportMotivationTypes as $supportMotivationType) {
            SupportMotivationType::create($supportMotivationType);
        }
    }
}
