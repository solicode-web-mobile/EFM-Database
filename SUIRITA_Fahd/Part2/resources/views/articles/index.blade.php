@extends('layouts.app')

@section('content')
<div class="container w-2/3 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Article List</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-4 shadow">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-600 text-white p-4 rounded-lg mb-4 shadow">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Author</th>
                    <th class="px-6 py-3 text-left">Views</th>
                    <th class="px-6 py-3 text-left">Categories</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4 text-gray-800">{{ $article->title }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $article->user->name }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $article->views }}</td>
                        <td class="px-6 py-4">
                            @foreach ($article->categories as $category)
                                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full mr-2">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <a href="{{ route('articles.edit', $article->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition focus:ring focus:ring-blue-300">Edit</a>
                            <a href="{{ route('articles.show', $article->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition focus:ring focus:ring-gray-300">View</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition focus:ring focus:ring-red-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
