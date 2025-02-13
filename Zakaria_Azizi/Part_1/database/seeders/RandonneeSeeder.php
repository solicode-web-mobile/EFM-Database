<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Randonnee;

class RandonneeSeeder extends Seeder
{
    public function run()
    {
        Randonnee::create([
            'nom' => 'Randonnée Atlas',
            'membre_id' => 1,
            'vues' => 0
        ]);

        Randonnee::create([
            'nom' => 'Randonnée Sahara',
            'membre_id' => 2,
            'vues' => 0
        ]);
    }
}
