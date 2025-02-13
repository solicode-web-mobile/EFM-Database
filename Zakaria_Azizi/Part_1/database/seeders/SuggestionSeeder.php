<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        Suggestion::create(['contenu' => 'Ajouter plus de pauses']);
        Suggestion::create(['contenu' => 'Prévoir des snacks']);
    }
}
