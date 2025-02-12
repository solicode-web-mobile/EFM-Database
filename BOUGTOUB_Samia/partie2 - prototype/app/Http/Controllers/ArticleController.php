<?php

namespace App\Http\Controllers;

use App\Models\Article;
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

         // Incrémente les vues des articles et des commentaires associés.
        foreach($articles as $article){
            $this->articleService->incrementArticleViews($article);
            $this->articleService->incrementCommentViews($article);
     
        }
        

        // Vérifie si l’article doit recevoir la catégorie Populaire
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
       // Récupérer l'article avec l'ID donné, y compris les relations
       $article = Article::with(['user', 'comments', 'categories'])->findOrFail($id);

      

       // Retourner la vue avec l'article
       return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            "title"=> 'required|string',
            'categories' => 'nullable|array',    
        ]);
        $article->update([ 
            'title' => $validated['title'],
            'content' => $validated['content']]);

        $this->articleService->updateArticleCategories($article ,$validated['categories']);

        return redirect()->route('articles.show', $article)->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $id)
    {
       $this->articleService->delete($id);
    }
}
