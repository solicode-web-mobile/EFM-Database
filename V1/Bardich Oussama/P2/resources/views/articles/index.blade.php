@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Articles</h1>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full bg-white border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left">Titre</th>
                    <th class="px-6 py-3 text-left">Auteur</th>
                    <th class="px-6 py-3 text-left">Vues</th>
                    <th class="px-6 py-3 text-left">Commentaires</th>
                    <th class="px-6 py-3 text-left">Catégories</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($articles as $article)
                <tr class="border-b border-gray-200 odd:bg-gray-50 hover:bg-gray-100 transition">
                    <td class="px-6 py-4">
                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:underline">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4">{{ $article->user->name }}</td>
                    <td class="px-6 py-4">{{ $article->view_counter }}</td>
                    <td class="px-6 py-4">
                        <ul class="list-disc pl-4 text-sm">
                            @foreach ($article->comments as $comment)
                            <li>
                                <span class="font-semibold">{{ $comment->content }}</span> 
                                <span class="text-gray-500 text-xs">Vues: {{ $comment->view_counter }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-4">
                        <ul class="list-disc pl-4 text-sm">
                            @foreach ($article->categories as $category)
                            <li class="text-blue-500">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('articles.edit', $article->id) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                            Modifier
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
