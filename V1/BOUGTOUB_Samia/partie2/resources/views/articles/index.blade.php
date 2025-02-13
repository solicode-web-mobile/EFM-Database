@extends('layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">Liste des Articles</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 text-sm font-medium text-gray-600">Titre</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-600">Auteur</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-600">Vues</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-600">Catégories</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 text-sm text-gray-800">{{ $article->title }}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">{{ $article->user->name }}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">{{ $article->views }}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        @foreach ($article->categories as $category)
                            <span class="inline-block bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-full mr-1">{{ $category->name }}</span>
                        @endforeach

                    </td>

                    <td class="px-4 py-2 text-sm text-gray-800">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('articles.edit', $article->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mr-2">
                            Modifier
                        </a>
                        <a href="{{ route('articles.show', $article->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mr-2">
                            Voir
                        </a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
