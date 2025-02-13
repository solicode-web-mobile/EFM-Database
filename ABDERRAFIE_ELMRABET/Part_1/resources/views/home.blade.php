@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary text-center">Hiking Proposals</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Views</th>
                    <th>Reviews</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hikes as $hike)
                <tr>
                    <td>{{ $hike->title }}</td>
                    <td>{{ $hike->user->name }}</td>
                    <td>{{ $hike->views }}</td>
                    <td>
                        {{-- @if(!empty($recommended[$hike->id]))
                        {{ $recommended[$hike->id] }}
                        @endif --}}
                        @foreach ($hike->reviews as $review)
                        <p style="font-weight: bold;">{{ $review->user->name }}:</p> {{ $review->content }} <br>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
