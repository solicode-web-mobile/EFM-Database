@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary text-center">Edit Review Suggestions</h1>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label"><strong>Review Content:</strong></label>
            <p class="form-control">{{ $review->content }}</p>
        </div>

        <h4>Suggestions:</h4>
        @foreach ($review->suggestions as $suggestion)
        <div class="mb-3">
            <label class="form-label">Suggestion from {{ $suggestion->user->name }}:</label>
            <input type="text" class="form-control" name="suggestions[{{ $suggestion->id }}]" value="{{ $suggestion->content }}">
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="{{ route('hikes.show', $review->hike->id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection