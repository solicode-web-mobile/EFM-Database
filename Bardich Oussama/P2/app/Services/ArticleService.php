<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{


    public function getArticlesWithRelations()
    {
        $articles = Article::with(['user', 'comments', 'categories'])->get();
    
      
        $avgViews = $articles->avg('view_counter');
        
        foreach ($articles as $article) {
            if ($article->view_counter > 0) {
                $populairCatego = new Category([
                    'name' => 'populair',
                    'color' => $article->view_counter > $avgViews ? 'red' : 'black'
                ]);
                
                $article->setRelation('categories', $article->categories->push($populairCatego));
            }
        }
        
        return $articles;
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
