<?php

namespace Database\Seeders;

use App\Models\Avie;
use App\Models\FeedBack;
use App\Models\FeedbackType;
use App\Models\Strategy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $password = '123456';
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->strategySeeder();
        $this->feedbackTypeSeeder();
        $this->avieSeeder();
        $this->feedbackSeeder();


    }

    private function strategySeeder()
    {
        Strategy::insert([
            [
                'user_id' => 1,
                'title' => 'Strategy One',
                'content' => 'Content of strategy one.',
                'vu' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'title' => 'Strategy Two for One',
                'content' => 'Content of strategy Two.',
                'vu' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'title' => 'Strategy Two',
                'content' => 'Content of strategy two.',
                'vu' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    private function avieSeeder()
    {
        Avie::insert([
            [
                'user_id' => 1,
                'strategy_id' => 2,
                'content' => 'Great strategy!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'strategy_id' => 1,
                'content' => 'Good strategy!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'strategy_id' => 1,
                'content' => 'Needs improvement.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    private function feedbackSeeder()
    {
        FeedBack::insert([
            ['avie_id' => 1, 'feedback_type_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['avie_id' => 1, 'feedback_type_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['avie_id' => 1, 'feedback_type_id' => 3,'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    private function feedbackTypeSeeder()
    {
        FeedbackType::insert([
            ['title' => 'Positive', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Negative', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Neutral', 'created_at' => now(), 'updated_at' => now()]
        ]);
    } 
}
