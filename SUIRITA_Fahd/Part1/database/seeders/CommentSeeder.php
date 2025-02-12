<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            [
                'content' => 'Comment 1',
                'article_id' => 1,
                'views' => 10
            ],
            [
                'content' => 'Comment 2',
                'article_id' => 1,
                'views' => 8
            ],
            [
                'content' => 'Comment 3',
                'article_id' => 1,
            ],
            [
                'content' => 'Comment 4',
                'article_id' => 2,
                'views' => 7
            ],
            [
                'content' => 'Comment 5',
                'article_id' => 2,
            ],
            [
                'content' => 'Comment 6',
                'article_id' => 3,
            ],
        ];

        foreach ($comments as $comment) {
            \App\Models\Comment::create($comment);
        }
    }
}
