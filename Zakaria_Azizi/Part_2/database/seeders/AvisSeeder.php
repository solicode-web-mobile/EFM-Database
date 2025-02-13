<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avis;

class AvisSeeder extends Seeder
{
    public function run()
    {
        Avis::create([
            'randonnee_id' => 1,
            'contenu' => 'Superbe randonnée dans l’Atlas !',
            'vues' => 0,
            'positif' => 5
        ]);

        Avis::create([
            'randonnee_id' => 2,
            'contenu' => 'Expérience incroyable dans le désert !',
            'vues' => 0,
            'positif' => 8
        ]);
    }
}
