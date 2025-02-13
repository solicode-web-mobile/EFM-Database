<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Support Messages</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Message</th>
                <th>Types de Motivation</th>
                <th>Actions</th> <!-- Nouvelle colonne -->
            </tr>
        </thead>
        <tbody>
            @foreach($supportMessages as $support)
                <tr>
                    <td>{{ $support->content }}</td>
                    <td>
                        @foreach($support->typeMotivations as $type)
                            <span>{{ $type->name }}</span><br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        
                        <!-- Formulaire de suppression -->
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
