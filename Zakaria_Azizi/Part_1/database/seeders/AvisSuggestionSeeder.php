<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvisSuggestionSeeder extends Seeder
{
    public function run()
    {
        DB::table('avis_suggestion')->insert([
            ['avis_id' => 1, 'suggestion_id' => 1],
            ['avis_id' => 2, 'suggestion_id' => 2],
        ]);
    }
}
