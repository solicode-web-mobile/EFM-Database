<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Article 1',
                'view_counter' => 15,
                'user_id' => 1,
            ],
            [
                'title' => 'Article 2',
                'user_id' => 2,
            ],
            [
                'title' => 'Article 3',
                'view_counter' => 9,
                'user_id' => 3,
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
