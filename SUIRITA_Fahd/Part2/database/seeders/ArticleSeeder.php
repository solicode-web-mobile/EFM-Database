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
                'user_id' => 1,
                'views' => 11,
            ],
            [
                'title' => 'Article 2',
                'user_id' => 2,
                'views' => 9,
            ],
            [
                'title' => 'Article 3',
                'user_id' => 3,
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
