@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Modifier l'Avis</h2>
    <form action="{{ route('avis_update', $avis->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
            <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title', $avis->title) }}" required>
            @error('title')
                <div class="text-red-500 text-xs italic mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenu</label>
            <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required>{{ old('content', $avis->content) }}</textarea>
            @error('content')
                <div class="text-red-500 text-xs italic mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="feedbacks" class="block text-gray-700 text-sm font-bold mb-2">Feedbacks</label>
            <select id="feedbacks" name="feedbacks[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                @foreach ($feedbacks as $feedback)
                    <option value="{{ $feedback->id }}" {{ in_array($feedback->id, $avis->feedbacks->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $feedback->content }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mettre à jour</button>
        <a href="{{ route('avis_list') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2">Annuler</a>
    </form>
</div>
@endsection