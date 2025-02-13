@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des Randonnées</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom de la Randonnée</th>
                <th>Membre</th>
                <th>Vues</th>
                <th>Avis</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($randonnées as $randonnee)
            <tr>
                <td>{{ $randonnee->title }}</td>
                <td>{{ $randonnee->member->name }}</td>
                <td>{{ $randonnee->views }}</td>
                <td>
                    <ul>
                        @foreach($randonnee->avis as $avis)
                        <li>
                            <strong>{{ $avis->content }}</strong> 
                            

                            
                            <ul>
                                @foreach($avis->suggestions as $suggestion)
                                <li>{{ $suggestion->content }}</li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <!-- Edit and Delete buttons -->
                    <div class="mt-2">
                        <a href="{{ route('avis.edit', $avis) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('avis.destroy', $avis) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
