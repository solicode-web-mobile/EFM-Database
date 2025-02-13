<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    protected $articleService;

    public function __construct(ArticleService  $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = $this->articleService->getArticlesWithRelations();
    
        foreach ($articles as $article) {
            if ($article->view_counter > 0) {
                $populairCatego = new Category(['name' => 'populair']);
                $article->setRelation('categories', $article->categories->push($populairCatego));
            }
        }
    
        return view('articles.index', compact('articles'));
    }
    

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }
    public function show(Article $article)
    {
        $this->articleService->incrementArticleViews($article);
        $this->articleService->incrementCommentViews($article);

        return view('articles.show', compact('article'));
    }

    public function update(Request $request, Article $article, ArticleService $articleService)
    {
        $this->articleService->updateArticleCategories($article, $request->categories ?? []);
        return redirect()->route('articles.index');
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    
}
