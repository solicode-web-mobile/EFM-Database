<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Vues</th>
                <th>Commentaires</th>
                <th>Catégories</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->view_counter }}</td>
                <td>
                    <ul>
                        @foreach ($article->comments as $comment)
                      <li>{{ $comment->content }}  View : {{ $comment->view_counter }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($article->categories as $category)
                        <li>{{ $category->name }}</li>
                      
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
            
        
        </tbody>
    </table>
</div>
@endsection