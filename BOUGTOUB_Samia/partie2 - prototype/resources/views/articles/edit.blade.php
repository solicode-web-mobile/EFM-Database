@extends('layout')

@section('content')
<div>
    <h2>Modifier l'article</h2>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}" required>

        <label>Catégories :</label>
        @foreach ($categories as $categorie)
            <div>
                <input type="checkbox" name="categories[]" value="{{ $categorie->id }}"
                    {{ in_array($categorie->id, $article->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                {{ $categorie->name }}
            </div>
        @endforeach

        <button type="submit">Modifier</button>
    </form>
</div>
@endsection
