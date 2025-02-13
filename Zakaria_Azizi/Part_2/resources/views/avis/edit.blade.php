<form action="/avis/{{ $avis->id }}" method="POST">
    @csrf
    @method('PUT')
    <label>Suggestions:</label>
    <select name="suggestions[]" multiple>
        @foreach($suggestions as $suggestion)
            <option value="{{ $suggestion->id }}" {{ in_array($suggestion->id, $avis->suggestions->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $suggestion->contenu }}
            </option>
        @endforeach
    </select>
    <button type="submit">Mettre à jour</button>
</form>
