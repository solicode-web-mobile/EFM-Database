@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary">{{ $hike->title }}</h1>
    <p><strong>By:</strong> {{ $hike->user->name }} | <strong>Views:</strong> {{ $hike->views }}</p>
    <p class="text-muted">{{ $hike->description }}</p>

    <h4 class="mt-4 text-success">Reviews:</h4>
    @foreach ($hike->reviews as $review)
    <div class="border rounded p-3 mb-3 bg-light">
        <p class="mb-2"><strong class="text-dark">{{ $review->user->name }}</strong>:</p>
        <p class="fst-italic">"{{ $review->content }}"</p>

        <p class="text-muted"><span class="badge bg-info">{{ $review->views }} views</span></p>

        <button class="btn btn-sm btn-outline-secondary show-suggestions-btn" data-review-id="{{ $review->id }}">Show Suggestions</button>
        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form style="display: inline;" action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
        <div class="suggestions mt-2 d-none" id="suggestions-{{ $review->id }}">
            <h6 class="text-primary mt-2">Suggestions:</h6>
            @foreach ($review->suggestions as $suggestion)
            <div class="border-start border-primary ps-3 py-2">
                <p class="mb-1"><strong class="text-dark">{{ $suggestion->user->name }}</strong>:</p>
                <p class="text-muted">{{ $suggestion->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<script>
    document.querySelectorAll('.show-suggestions-btn').forEach(button => {
        button.addEventListener('click', function() {
            let reviewId = this.getAttribute('data-review-id');
            let suggestionsDiv = document.getElementById('suggestions-' + reviewId);
            suggestionsDiv.classList.toggle('d-none');
        });
    });

</script>
@endsection
