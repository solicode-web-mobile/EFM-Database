@extends('layout')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-semibold mb-6">Modifier l'Article</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Titre de l'article -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre :</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" required 
                   class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Catégories de l'article -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Catégories :</label>
            <div class="mt-2 space-y-2">
                @foreach ($categories as $categorie)
                    <div class="flex items-center">
                        <input type="checkbox" name="categories[]" value="{{ $categorie->id }}"
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                               {{ in_array($categorie->id, $article->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">{{ $categorie->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Modifier
        </button>
        <a href="{{ url('/articles') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Annuler
        </a>
       

    </form>
</div>
@endsection
