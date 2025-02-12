<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
 
  
    public function getArticlesWithRelations()
    {
   
    }

    public function incrementArticleViews(Article $article): void
    {
   
    }

    public function incrementCommentViews(Article $article): void
    {
     
    }
    public function updateArticleCategories(Article $article, array $categoryIds): void
    {
      
    }
}