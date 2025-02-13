@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Review</h2>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{{ $review->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="views">Views</label>
            <input type="text" class="form-control" name="views" id="views" value="{{ $review->views }}">
        </div>

        <div class="form-group">
            <label for="suggestions">Suggestions</label>
            @foreach($review->suggestions as $suggestion)
                <div class="form-check">
                    <label>
                        <!-- Input field for suggestion content, only the content will be editable -->
                        <input type="text" name="suggestions[{{ $suggestion->id }}]" 
                            value="{{ old('suggestions.' . $suggestion->id, $suggestion->content) }}" 
                            class="form-control mt-2" placeholder="Update suggestion content">
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
