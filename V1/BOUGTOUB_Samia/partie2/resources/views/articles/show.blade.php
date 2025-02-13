@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
    <a href="{{ route('articles.index') }}" 
       class="inline-block bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition mb-4">
        ← Retour
    </a>

    <h1 class="text-2xl font-bold text-gray-800">{{ $article->title }}</h1>
    
        <small class="text-gray-500 bg-gray-200 px-2 py-1 rounded-md text-xs">
            {{ $article->views }} vues
        </small>

    <div class="mt-4">
        <h2 class="text-lg font-semibold text-gray-700">Catégories :</h2>
        <ul class="list-disc list-inside text-gray-600 mt-2">
            @foreach($article->categories as $cat)
                <li class="bg-gray-100 px-3 py-1 rounded-md inline-block shadow-sm">
                    {{ $cat->name }} 
                   
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-700">Commentaires :</h2>
        <ul class="mt-2 space-y-2">
            @forelse($article->comments as $comment)
            <li class="bg-gray-100 p-4 rounded-md shadow-md border-l-4 border-blue-500 flex justify-between items-center">
                <span class="text-gray-700">{{ $comment->content }}</span>
                <small class="text-gray-500 bg-gray-200 px-2 py-1 rounded-md text-xs">
                {{ $comment->views }} vues
                </small>
            </li>

            @empty
                <li class="text-gray-500 italic">Aucun commentaire</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
