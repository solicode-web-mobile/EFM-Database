<?php
namespace App\Services ;

use App\Models\Article;

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
        $article = Article::where('id', $id)->first();
        $article->delete();
    }

}