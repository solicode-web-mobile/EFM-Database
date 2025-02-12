<?php
namespace App\Services ;

use App\Models\Article;
use App\Models\Category;

class ArticleService{

    //méthode getArticlesWithRelations()
    public function getArticlesWithRelations(){
        return Article::with(['user', 'comments', 'categories'])->get();
    }

    // méthode incrementArticleViews
    public function incrementArticleViews(Article $article){
        $article->increment('views');
    }

    // méthode incrementCommentViews
    public function incrementCommentViews(Article $article){
        foreach($article->comments as $comment){
            $comment->increment('views');
        }
    }
    //updateArticleCategories
    public function updateArticleCategories(Article $article, array $categoryIds){
        
        $article->categories()->sync($categoryIds);
    }

    //delete

    public function delete($id){
    // Trouver l'article par son ID
        $article = Article::findOrFail($id);
        $article->comments()->delete();
        $article->categories()->detach();
        $article->delete();
    }

    // get categories
    public function allCategories(){
        return Category::all();
    }

    public function getArticle($id){
        // Récupérer l'article avec l'ID donné, y compris les relations
       return Article::with(['user', 'comments', 'categories'])->findOrFail($id);

    }
}