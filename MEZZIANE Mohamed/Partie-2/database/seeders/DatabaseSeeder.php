<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Member;
use App\Models\Randonnee;
use App\Models\Avis;
use App\Models\Suggestion;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     public function run()
     {
         $member = Member::create(['name' => 'Mohamed Mezziane']);
     
         $randonnee = Randonnee::create([
             'title' => 'Mountain Adventure',
             'description' => 'A beautiful hiking experience.',
             'views' => 0,
             'member_id' => $member->id
         ]);
     
         $avis = Avis::create([
             'content' => 'Great experience!',
             'views' => 0,
             'randonnee_id' => $randonnee->id
         ]);
     
         $suggestion = Suggestion::create(['content' => 'Bring extra water.', 'views' => 0]);
     
         $avis->suggestions()->attach($suggestion->id);
     }
     
}


