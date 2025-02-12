
<div class="container">
    <h2>Edit Support Motivation</h2>
    <form action="{{ route('support_motivation.update', $supportMotivation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="type_motivation_ids">Select Motivation Types:</label>
        <select name="type_motivation_ids[]" multiple>
            @foreach($typeMotivations as $type)
                <option value="{{ $type->id }}" {{ in_array($type->id, $supportMotivation->typeMotivations->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

