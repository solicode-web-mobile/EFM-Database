<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Membre;

class MembreSeeder extends Seeder
{
    public function run()
    {
        Membre::create([
            'nom' => 'Zakaria',
            'email' => 'zakaria@example.com'
        ]);

        Membre::create([
            'nom' => 'Oussama',
            'email' => 'oussama@example.com'
        ]);
    }
}
