<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
 
 
 
    public function __construct( ArticleService $articleService)
    {
 
    }

    public function index()
    {
       
    
    
    }
  
    public function show(Article $article)
    {
     
    }

    
    public function edit(Article $article)
    {
       
   
    }
 
    public function update(Request $request, Article $article)
    {
    
    }

    
    public function destroy(Article $article)
    {
  
    }
}
