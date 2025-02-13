<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Messages de soutien </h2>
    
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Image partagée</th>
                <th>Nom de l’employé</th>
                <th>Messages de soutien</th>
                <th>Types de motivation</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                @foreach($image->supportMotivations as $support)
                    <tr>
                        <td class="text-center">
                            <img src="{{ $image->url }}" width="80" class="img-thumbnail">
                        </td>
                        <td>{{ $image->employe->name ?? 'N/A' }}</td>
                        <td>{{ $support->content }}</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>
                                    <small class="text-muted">{{ $support->typeMotivations->pluck('name')->join(', ') }}</small>
                                </li>
                            </ul>
                        </td>
                        <td>
                           
                            <a href="{{ route('support_motivation.edit', $support->id) }}" class="btn btn-primary btn-sm">Modifier</a>
        
                            
                            <form action="{{ route('support_motivation.destroy', $support->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>