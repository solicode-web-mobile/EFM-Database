<?php
namespace App\Services ;

use App\Models\Article;

class ArticleService{
    public function getArticlesWithRelations(){
        return Article::with(['user', 'comments', 'categories'])->get();
    }
    public function incrementArticleViews(Article $article){
        $article->increment('views');
    }

    public function incrementCommentViews(Article $article){
        foreach($article->comments as $comment){
            $comment->increment('view');
        }
    }

}