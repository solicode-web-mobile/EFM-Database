<?php

namespace App\Service;

use App\Models\Article;
use App\Models\Category;

class ArticleService {

    public function getArticlesWithRelations()
    {
        $articles = Article::with(['user','comments','categories'])->get();
        foreach ($articles as $article) {
            if($article->view_counter >=10)
            {
                $categories = $article->categories;
                $populaire = new Category();
                $populaire->name = 'Populaire';
                $categories->push($populaire);
                $article->setRelation('categories',$categories);
                // $article->populaire = true;
            }
        }
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




