<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        return $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = $this->articleService->getArticlesWithRelations();

        foreach ($articles as $article) {
            $categories = $article->categories;

            if ($article->views > 10 && !$categories->contains('name', 'Popular')) {
                $categories->push((object) ['name' => 'Popular']);
            }

            $article->setRelation('categories', $categories);
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::with(['user', 'comments', 'categories'])->findOrFail($id);

        $this->articleService->incrementArticleViews($article);
        $this->articleService->incrementCommentViews($article);

        return view('articles.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::with('categories')->findOrFail($id);
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'categories' => 'array',
            'categories.*' => 'exists:categories,id'
        ]);

        $this->articleService->updateArticleCategories($article, $request->input('categories', []));

        return redirect()->route('articles.index')->with('success', 'Article categories updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
