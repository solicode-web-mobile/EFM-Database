<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MembreSeeder::class,
            RandonneeSeeder::class,
            AvisSeeder::class,
            SuggestionSeeder::class,
            AvisSuggestionSeeder::class,
        ]);
    }
}
