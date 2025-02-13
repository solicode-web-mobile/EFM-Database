@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">Edit Article Categories</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method since we are updating -->

        <div class="space-y-4">
            @foreach($categories as $category)
                <label class="flex items-center space-x-3 p-3 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    <input 
                        type="checkbox" 
                        name="categories[]" 
                        value="{{ $category->id }}"
                        class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array($category->id, $article->categories->pluck('id')->toArray()) ? 'checked' : '' }}
                    >
                    <span class="text-gray-700 font-medium">{{ $category->name }}</span>
                </label>
            @endforeach
        </div>

        <div class="mt-6 flex justify-between">
            <button 
                type="submit" 
                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition"
            >
                Update Categories
            </button>
            <a href="{{ route('articles.index') }}" 
                class="w-full sm:w-auto text-gray-700 font-medium py-2 px-6 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-center"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
