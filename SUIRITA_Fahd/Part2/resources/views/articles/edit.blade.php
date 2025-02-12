@extends('layouts.app')

@section('content')
<div class="container w-2/3 mx-auto p-6">
    <form action="{{ route('articles.update', $article->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-4xl font-bold mb-8 text-gray-800">Edit Article {{ $article->title }}</h2>
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-800">Categories:</label>
            <div class="mt-3 space-y-3">
                @foreach ($categories as $category)
                    <div class="flex items-center">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                               {{ in_array($category->id, $article->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span class="ml-3 text-gray-700">{{ $category->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Update
            </button>
            <a href="{{ url('/articles') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
