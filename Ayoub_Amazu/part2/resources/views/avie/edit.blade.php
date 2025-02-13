<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Avie</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier un Avis</h2>

        <form action="{{ route('avie.update', $avie->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Avie Content -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700">Contenu de l'Avis:</label>
                <textarea name="content" rows="4" class="w-full mt-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content', $avie->content) }}</textarea>
                @error('content')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Feedback Section -->
            <h3 class="text-lg font-semibold text-gray-700 mt-6">Feedbacks Associés:</h3>
            <div id="feedback-section" class="space-y-4 mt-3">
                @foreach($avie->feedback as $index => $feedback)
                <div class="flex items-center gap-3 bg-gray-100 p-3 rounded-lg">
                    <select name="feedback[{{ $index }}][type]" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($feedbackTypes as $type)
                        <option value="{{ $type->id }}" @if($type->id == $feedback->feedback_type_id) selected @endif>
                            {{ $type->title }}
                        </option>
                        @endforeach
                    </select>
                    <button type="button" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="removeFeedback(this)">X</button>
                </div>
                @endforeach
            </div>

            <!-- Add Feedback Button -->
            <button type="button" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center gap-2" onclick="addFeedback()">
                + Ajouter un Feedback
            </button>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Enregistrer les modifications</button>
            </div>
        </form>
    </div>

<script>
    let feedbackIndex = {{ count($avie->feedback) }};

    function addFeedback() {
        const feedbackSection = document.getElementById('feedback-section');
        const newFeedback = document.createElement('div');
        newFeedback.classList.add('flex', 'items-center', 'gap-3', 'bg-gray-100', 'p-3', 'rounded-lg');

        newFeedback.innerHTML = `
            <select name="feedback[\${feedbackIndex}][type]" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($feedbackTypes as $type)
                <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>
            <button type="button" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="removeFeedback(this)">X</button>
        `;

        feedbackSection.appendChild(newFeedback);
        feedbackIndex++;
    }

    function removeFeedback(button) {
        button.parentElement.remove();
    }
</script>

</body>
</html>
