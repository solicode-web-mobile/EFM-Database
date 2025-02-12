<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Article Title -->
    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>

    <!-- Article Content -->
    <div class="mb-6">
        <p class="text-lg text-gray-700">{{ $article->content }}</p>
    </div>

    <!-- Article Categories -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Catégories:</h2>
        <ul class="mt-2 list-disc list-inside">
            @forelse($article->categories as $category)
                <li class="text-gray-600">{{ $category->name }}</li>
            @empty
                <li class="text-gray-500">Aucune catégorie.</li>
            @endforelse
        </ul>
    </div>

    <!-- Article Comments -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Commentaires:</h2>
        @if($article->comments->count())
            <ul class="mt-2 space-y-4">
                @foreach($article->comments as $comment)
                    <li class="bg-gray-100 p-4 rounded shadow">
                        <p class="text-gray-600">{{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">Vues: {{ $comment->view_counter }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">Aucun commentaire pour cet article.</p>
        @endif
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('articles.index') }}" class="text-indigo-600 hover:text-indigo-800">
            &larr; Retour à la liste des articles
        </a>
    </div>
</div>
@endsection
