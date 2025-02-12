<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
 
  protected $articleService;
 
    public function __construct(ArticleService  $articleService )
    {
     $this->articleService = $articleService;
    }

    public function index()
    {
    
        $articles = $this->articleService->getArticlesWithRelations();

        foreach($articles as $article){

            if($article->view_counter > 0){

                $populairArticle = new Category(['name ' => 'populair']);
                $article->setRelation('categories', $article->categories->push($populairArticle));

            }

            return view('articles.index',compact('articles'));

        }
    }

}
