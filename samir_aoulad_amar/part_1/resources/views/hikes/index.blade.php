@extends('layouts.app')

@section('content')
 <table>
    <header>
        <tr>
        <th>user</th>
        <th>title</th>
        <th>descritpion</th>
        <th>views</th>
        <th>reviews</th>
 </tr>
    </header>
<tbody>

    @foreach ($hikes as $hike)
         <tr>
        <td>{{ $hike->user->name }}</td>
        <td>{{ $hike->title }}</td>
        <td>{{$hike->description }}</td>
        <td>{{ $hike->views }}</td>
        <td>
            <ul>
                @if (!empty($recommended[$hike->id]))
                    <li><span>{{ $recommended[$hike->id] }}</span></li>
                @endif
            </ul>
            @foreach ($hike->reviews as $review)
                <strong>{{ $review->user->name }}</strong>
                {{ $review->content  }}  view:{{ $review->views }}
                <ul>
                    @foreach ($review->suggestions as $suggestion)
                        <li>
                            <strong>{{ $suggestion->user->name }}</strong>
                            {{ $suggestion->content  }}  view:{{ $suggestion->views }}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </td>

    </tr>
    @endforeach
   
</tbody>
    
 </table>
@endsection

 