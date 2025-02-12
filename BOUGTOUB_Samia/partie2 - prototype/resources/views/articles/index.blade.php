
@extends('layout')
@section('content')
<div>
@foreach ($articles as $article )
      <h1>{{ $article->title }} : <small>view : {{$article->views}}</small></h1>
   
    <h2>Categories</h2>
    <ul>
        @foreach($article->categories as $categorie)
            <li>{{ $categorie->name }} </li>
        @endforeach
    </ul>   
    <h2>Commentaires</h2>
    <ul>
        @foreach($article->comments as $comment)
            <li>{{ $comment->content }} <small>({{ $comment->views }} : vues)</small></li>
        @endforeach
    </ul>
    <button>
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Modifier</a>
    </button>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
        Supprimer
    </button>
    </form>

   
    @endforeach
</div>
@endsection