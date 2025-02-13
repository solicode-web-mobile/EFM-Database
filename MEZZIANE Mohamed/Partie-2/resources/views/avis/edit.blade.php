@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Modification de l'avis</h2>

    <form action="{{ route('avis.update', $avis) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="content">Contenu de l'avis</label>
            <textarea name="content" id="content" class="form-control" rows="4">{{ old('content', $avis->content) }}</textarea>
            @error('content')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="suggestions">Suggestions d'amélioration</label>
            <select name="suggestions[]" id="suggestions" class="form-control" multiple>
                @foreach($suggestions as $suggestion)
                    <option value="{{ $suggestion->id }}" 
                        {{ in_array($suggestion->id, $avis->suggestions->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $suggestion->content }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mise à jour de l'avis</button>
    </form>
</div>
@endsection
