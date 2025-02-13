<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images & Support Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Images & Support Messages</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Employee</th>
                <th>Views</th>
                <th>Support Messages</th>
                <th>Actions</th>  <!-- Nouvelle colonne pour les actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="text-center">
                        <img src="{{ $image->url }}" width="80" class="img-thumbnail">
                    </td>
                    <td>{{ $image->employe->name ?? 'N/A' }}</td>
                    <td class="text-center">{{ $image->views }}</td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($image->supportMotivations as $support)
                                <li>
                                    {{ $support->content }} (views: {{ $support->views }})<br>
                                    <small class="text-muted">
                                        @foreach($support->typeMotivations as $typeMotivation)
                                            {{ $typeMotivation->name }}@if(!$loop->last), @endif
                                        @endforeach
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>  <!-- Nouvelle colonne d'actions -->
                        <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <!-- Formulaire pour supprimer un message de soutien -->
                        <form action="{{ route('supports.destroy', $support->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message de soutien ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
