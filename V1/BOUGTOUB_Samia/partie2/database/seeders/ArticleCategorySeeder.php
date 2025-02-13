<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article1 = \App\Models\Article::find(1);
        $article2 = \App\Models\Article::find(2);
        $article3 = \App\Models\Article::find(3);
        $category1 = \App\Models\Category::find(1);
        $category2 = \App\Models\Category::find(2);
        $category3 = \App\Models\Category::find(3);

        $article1->categories()->attach($category1->id);
        $article1->categories()->attach($category2->id);

        $article2->categories()->attach($category2->id);
        $article2->categories()->attach($category3->id);

        $article3->categories()->attach($category3->id);
        $article3->categories()->attach($category1->id);
    }
}
