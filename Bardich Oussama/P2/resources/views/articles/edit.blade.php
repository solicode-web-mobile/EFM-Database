@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold text-center">Edit Article</h2>
    <form  class="mt-6">
         

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
            <div class="space-y-4">
            
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="" 
                            value=""
                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                         
                        >
                        <label class="ml-2 text-gray-700"></label>
                    </div>
          
            </div>
        </div>
        <div class="flex justify-between">
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Update Article
            </button>
            <a href="" class="text-gray-600 hover:text-gray-800">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
