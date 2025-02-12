@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color: black;">Hikes</h2>
        <table border="1" width="100%" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border:1px solid rgb(160, 26, 190) " >User</th>
                    <th style="border:1px solid rgb(160, 26, 190) " >Title</th>
                    <th style="border:1px solid rgb(160, 26, 190) " >Description</th>
                    <th style="border:1px solid rgb(160, 26, 190) " >Views</th>
                    <th style="border:1px solid rgb(160, 26, 190) " >Reviews</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hikes as $hike)
                    <tr style="border:1px ">
                        <td style="border:1px solid black "> 
                            {{ $hike->user ? $hike->user->name : 'Unknown' }}
                        </td>
                        <td style="border:1px solid black "> {{ $hike->title }}</td>
                        <td style="border:1px solid black "> {{ $hike->description }}</td>
                        <td style="border:1px solid black "><strong>{{ $hike->views }}</strong></td>
                        <td style="border:1px solid black "> 
                            @if (!empty($recommended[$hike->id]))
                                <span class="badge bg-success">{{ $recommended[$hike->id] }}</span>
                            @endif
                            <ul>
                                @foreach ($hike->reviews as $review)
                                    <li>
                                        <strong>#{{ $review->user ? $review->user->name : 'Anonymous' }}</strong>: 
                                        {{ $review->content }} (Views: {{ $review->views }})
                                        @if ($review->suggestions->count() > 0)
                                            <ul>
                                                @foreach ($review->suggestions as $suggestion)
                                                    <li>{{ $suggestion->content }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
