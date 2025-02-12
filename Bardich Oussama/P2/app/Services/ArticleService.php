<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{


    public function getArticlesWithRelations()
    {
        return Article::with(['user', 'comments', 'categories'])->get();
    }

    public function incrementArticleViews(Article $article): void
    {
        $article->increment('view_counter');
    }

    public function incrementCommentViews(Article $article): void
    {
        foreach ($article->comments as $comment) {
            $comment->increment('view_counter');
        }
    }
    public function updateArticleCategories(Article $article, array $categoryIds): void
    {
        $article->categories()->sync($categoryIds);

       
    }
}
