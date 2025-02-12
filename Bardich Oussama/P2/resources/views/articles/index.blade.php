@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-semibold mb-6">Articles</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Titre</th>
                    <th class="px-4 py-2 text-left">Auteur</th>
                    <th class="px-4 py-2 text-left">Vues</th>
                    <th class="px-4 py-2 text-left">Commentaires</th>
                    <th class="px-4 py-2 text-left">Catégories</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
            
                <tr class="border-b">
                    <td class="px-4 py-2">
                   
                </td>
                   
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2">
                        <ul>
                          
                        </ul>
                    </td>
                    <td class="px-4 py-2">
                        <ul>
                     
                        </ul>
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <!-- Edit Button -->
                        <a  
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Modifier
                        </a>
                        <!-- Delete Button -->
                        <form  class="inline-block">
                          
                            <button type="submit" 
                                    class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
             
            </tbody>
        </table>
    </div>
</div>
@endsection
