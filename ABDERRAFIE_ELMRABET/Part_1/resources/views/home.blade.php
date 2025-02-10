@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary text-center">Hiking Proposals</h1>

    @foreach ($hikes as $hike)
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="card-title text-success">{{ $hike->title }}</h3>
                <p class="text-muted">By <strong>{{ $hike->user->name }}</strong> | <span class="badge bg-secondary">{{ $hike->views }} views</span></p>
                <p class="card-text">{{ $hike->description }}</p>

                <h5 class="mt-4 text-info">Reviews:</h5>
                @foreach ($hike->reviews as $review)
                    <div class="border rounded p-3 mb-3 bg-light">
                        <p class="mb-2"><strong class="text-dark">{{ $review->user->name }}</strong>:</p>
                        <p class="fst-italic">"{{ $review->content }}"</p>

                        <!-- Display Suggestions under each Review -->
                        @if ($review->suggestions->count() > 0)
                            <div class="ps-4 mt-2">
                                <h6 class="text-primary">Suggestions:</h6>
                                @foreach ($review->suggestions as $suggestion)
                                    <div class="border-start border-primary ps-3 py-2">
                                        <p class="mb-1"><strong class="text-dark">{{ $suggestion->user->name }}</strong>:</p>
                                        <p class="text-muted">{{ $suggestion->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection