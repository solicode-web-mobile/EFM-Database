@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Review Details</h2>

    <p><strong>Description:</strong> {{ $review->content }}</p>
    <p><strong>Views:</strong> {{ $review->views }}</p>

    <h4>Suggestions</h4>
    <ul>
        @foreach($review->suggestions as $suggestion)
            <li>{{ $suggestion->content }}</li>
        @endforeach
    </ul>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection  