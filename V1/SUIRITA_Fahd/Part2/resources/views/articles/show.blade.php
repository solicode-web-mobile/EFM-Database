@extends('layouts.app')

@section('content')
<div class="w-1/3 bg-white shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-3xl font-bold text-gray-900">{{ $article->title }}</h1>

    <small class="text-gray-500 px-2 py-1 rounded-md">
        {{ $article->views }} views
    </small>

    <div class="mt-4">
        <h2 class="text-lg font-semibold text-gray-800">Categories:</h2>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            @foreach($article->categories as $category)
                <li class="bg-gray-200 px-3 py-1 rounded-md inline-block shadow-sm">
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800">Comments:</h2>
        <ul class="mt-2 space-y-2">
            @forelse($article->comments as $comment)
            <li class="bg-gray-200 p-4 rounded-md shadow-md border-l-4 border-blue-600 flex justify-between items-center">
                <span class="text-gray-800">{{ $comment->content }}</span>
                <small class="text-gray-600 bg-gray-300 px-2 py-1 rounded-md text-xs">
                {{ $comment->views }} views
                </small>
            </li>
            @empty
                <li class="text-gray-600 italic">No comments</li>
            @endforelse
        </ul>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('articles.index') }}"
           class="inline-block bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
            ← Back
        </a>
    </div>
</div>
@endsection
