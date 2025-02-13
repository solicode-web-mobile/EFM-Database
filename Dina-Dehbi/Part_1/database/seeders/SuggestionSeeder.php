<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        Suggestion::create([
            'content' => 'Consider adding more rest stops along the way.',
            'review_id' => 1,
        ]);

        Suggestion::create([
            'content' => 'Maybe provide more water stations along the trail.',
            'review_id' => 2,
        ]);
        
        // Add other suggestions...
    }
}
