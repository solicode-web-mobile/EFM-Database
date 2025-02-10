<?php 

namespace App\Service;

use App\Models\Article;

class ArticleService {

    public function getArticlesWithRelations()
    {
        $articles = Article::with(['user','comments','categories'])->get();
        $articles[0]->populaire = true;
        return $articles;
    }
    private function incrementArticleViews(Article $article)
    {
        $article->increment('view-counter');
    }
    private function incrementCommentViews(Article $article)
    {
        $article->comments()->increment('view-counter');
    }
}




