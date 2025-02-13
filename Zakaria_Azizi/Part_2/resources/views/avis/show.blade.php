<div class="container mt-4">
    <h2>Liste des Avis</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Texte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avis as $avis)
                    <tr>
                        <td>{{ $avis->id }}</td>
                        <td>{{ $avis->texte }}</td>
                        <td>
                            <a href="{{ route('avis.edit', $avis->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('avis.destroy', $avis->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
