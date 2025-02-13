@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if($hikes->count())
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Utilisateur</th>
                        <th scope="col">Description</th>
                        <th scope="col">Vues</th>
                        <th scope="col">Recommandée</th>
                        <th scope="col">Avis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hikes as $hike)
                        @if($hike->title && $hike->user && $hike->image)
                            <tr>
                                <td>{{ $hike->title }}</td>
                                <td>{{ $hike->user->name }}</td>
                                <td>{{ $hike->description ?? 'Pas de description' }}</td>
                                <td>{{ $hike->views ?? 0 }}</td>
                                <td>
                                    @if($hike->isRecommended)
                                        <span class="badge badge-success">Randonnée Recommandée</span>
                                    @else
                                        <span class="badge badge-danger">Non recommandée</span>
                                    @endif
                                </td>
                                <td>
                                    @if($hike->reviews->count())
                                        <ul class="list-unstyled">
                                            @foreach ($hike->reviews as $review)
                                                @if($review->content && $review->user)
                                                    <li>
                                                        <strong>{{ $review->user->name }}</strong>: {{ $review->content }} <br>
                                                        <strong>Vues :</strong> {{ $review->views ?? 0 }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Pas d'avis</p>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Aucune randonnée disponible.</p>
        @endif
    </div>
@endsection

@section('head')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.blade.css') }}" rel="stylesheet">
@endsection
