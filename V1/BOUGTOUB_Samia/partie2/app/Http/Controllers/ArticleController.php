<?php

namespace App\Http\Controllers;


use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService ;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService ;
    }
    public function index()
    {
        // Récupère la liste des articles via ArticleService
        $articles = $this->articleService->getArticlesWithRelations();

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
       
        $article = $this->articleService->getArticle($id);
        
         // Incrémente les vues des articles et des commentaires associés.
        $this->articleService->incrementArticleViews($article);
        $this->articleService->incrementCommentViews($article);

       // Retourner la vue avec l'article
       return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $categories = $this->articleService->allCategories();
      $article = $this->articleService->getArticle($id);
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            "title"=> 'required|string',
            'categories' => 'nullable|array',    
        ]);
        $article = $this->articleService->getArticle($id);
        $article->update([ 
            'title' => $validated['title'],]);

        $this->articleService->updateArticleCategories($article ,$validated['categories']);

        return redirect()->route('articles.index', $article)->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $this->articleService->delete($id);
       return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
