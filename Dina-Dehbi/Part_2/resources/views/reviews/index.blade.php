@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/home.blade.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Liste des Avis</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Description</th>
                <th>Views</th>
                <th>Suggestions</th>  <!-- Nouvelle colonne pour les suggestions -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->views }}</td>
                    <td>
                        @foreach($review->suggestions as $suggestion)
                            <span>{{ $suggestion->content }}</span>  <!-- Afficher le contenu de chaque suggestion -->
                            @if(!$loop->last), @endif  <!-- Ajouter une virgule entre les suggestions, sauf pour le dernier -->
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
