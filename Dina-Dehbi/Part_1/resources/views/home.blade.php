@extends('layouts.app')

@section('content')
<div>
    @if($hikes->count())
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>User</th>
                    <th>Description</th>
                    <th>Views</th>
                    <th>Recommended</th>
                    <th>Reviews</th>
                    <th>Suggestions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hikes as $hike)
                    @if($hike->title && $hike->user && $hike->image)
                        @php
                            $totalReviews = $hike->reviews->count();
                            $isRecommended = $hike->reviews->filter(function($review) {
                                return $review->isRecommended;
                            })->count() > $totalReviews / 2;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ asset($hike->image) }}" alt="Hike Image" width="100">
                            </td>
                            <td>{{ $hike->title }}</td>
                            <td>{{ $hike->user->name }}</td>
                            <td>{{ $hike->description ?? 'No description' }}</td>
                            <td>{{ $hike->views ?? 0 }}</td>
                            <td>
                                @if($isRecommended)
                                    Recommended Hike
                                @else
                                    Not recommended
                                @endif
                            </td>
                            <td>
                                @if($totalReviews > 10)
                                    <p>{{ $totalReviews }} reviews available!</p>
                                    <ul>
                                        @foreach ($hike->reviews as $review)
                                            @if($review->content && $review->user)
                                                <li>
                                                    {{ $review->user->name }}: {{ $review->content }} <br>
                                                    Views: {{ $review->views ?? 0 }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    @if($hike->reviews->count())
                                        <ul>
                                            @foreach ($hike->reviews as $review)
                                                @if($review->content && $review->user)
                                                    <li>
                                                        {{ $review->user->name }}: {{ $review->content }} <br>
                                                        Views: {{ $review->views ?? 0 }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        No reviews
                                    @endif
                                @endif
                            </td>
                            <td>
                               
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hikes available.</p>
    @endif
</div>
@endsection
