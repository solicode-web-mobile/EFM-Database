<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le message de soutien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Modifier le message de soutien</h2>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('images.update', $supportMotivation->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-3">
            <label for="content" class="form-label">Message de soutien</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ old('content', $supportMotivation->content) }}</textarea>
        </div>

        
        <div class="mb-3">
            <label for="typeMotivation" class="form-label">Types de motivation</label>
            <div class="border p-2">
                @foreach($typeMotivations as $type)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="type_motivation_id[]" value="{{ $type->id }}"
                            {{ in_array($type->id, $supportMotivation->typeMotivations->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $type->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
        <a href="{{ route('images.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
