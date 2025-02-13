<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticlesWithRelations()
    {
        return Article::with(['user', 'categories', 'comments'])->get();
    }

    public function incrementArticleViews(Article $article)
    {
        return $article->increment('views');
    }

    public function incrementCommentViews(Article $article)
    {
        return $article->comments()->increment('views');
    }
}
