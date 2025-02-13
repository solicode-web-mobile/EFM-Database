<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Randonnées</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4 text-center">Liste des Randonnées</h1>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Nom de la Randonnée</th>
                <th>Nom du Membre</th>
                <th>Nombre de Vues</th>
                <th>Avis (Vues)</th>
                <th>Suggestions d'Amélioration</th>
                <th>Recommandée</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($randonnees as $randonnee)
                <tr>
                    <td>{{ $randonnee->nom }}</td>
                    <td>{{ $randonnee->membre->nom }}</td>
                    <td>{{ $randonnee->vues }}</td>
                    <td>
                        <ul class="list-unstyled text-secondary">
                            @foreach($randonnee->avis as $avis)
                                <li>
                                    {{ $avis->contenu }} ({{ $avis->vues }} positif)
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($randonnee->avis as $avis)
                                @foreach($avis->suggestions as $suggestion)
                                    <li>🔹 {{ $suggestion->contenu }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @if ($randonnee->avis->sum('vues') > 10)
                            <span class="text-success fw-bold">Oui </span>
                        @else
                            <span class="text-danger fw-bold">Non </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
