<?php

namespace App\Service;

use App\Models\Article;


class ArticleService {

    public function getArticlesWithRelations()
    {
        $articles =Article::with('user','categories','comments')->get();
        foreach($articles as $article){
        if($article->view_counter >10)
        {
            
        }
        }
        return $articles;
    }

    private function incrementArticleViews(Article $article)
    {
        $article->increment('view_counter');
    }
    private function incrementCommentViews(Article $article)
    {
        $article->comments->increment('view_counter');
    }

}