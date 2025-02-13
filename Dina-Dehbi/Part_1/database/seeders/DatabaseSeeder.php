<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate the database and disable foreign key checks
        $this->call([
            HikeSeeder::class,
            ReviewSeeder::class,
            SuggestionSeeder::class,
            UserSeeder::class, // Ensure UserSeeder is also called here to avoid conflicts
        ]);
    }
}
