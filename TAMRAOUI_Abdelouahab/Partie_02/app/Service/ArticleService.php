<?php

namespace App\Service;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Request;

class ArticleService {

    public function getArticlesWithRelations()
    {
        $articles = Article::with(['user','comments','categories'])->get();
        $averagePrice = Article::avg('view_counter');
        foreach ($articles as $article) {
            // $article->Avg = false;
            if($article->view_counter >=10)
            {
                $categories = $article->categories;
                $populaire = new Category();
                $populaire->name = 'Populaire';
                $categories->push($populaire);
                $article->setRelation('categories',$categories);
            }
            if($article->view_counter >$averagePrice)
            {
                $article->Avg = true;
            }
        }
        return $articles;
    }

    public function updateArticleCategories(Article $article, array $categoryIds)
    {

        $article->categories()->sync($categoryIds);
    }
    public function incrementArticleViews(Article $article)
    {
        $article->increment('view_counter');
    }
    public function incrementCommentViews(Article $article)
    {
        $article->comments()->increment('view_counter');
    }


}




