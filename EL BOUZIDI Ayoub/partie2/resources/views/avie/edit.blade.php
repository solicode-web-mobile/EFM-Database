<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Avie</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Avie</h2>

        <form action="{{ route('avie.update', $avie->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Avie Content -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Avie Content:</label>
                <textarea name="content" rows="4" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">{{ old('content', $avie->content) }}</textarea>
                @error('content')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Feedback Section -->
            <h3 class="text-lg font-semibold text-gray-700">Feedback:</h3>
            <div id="feedback-section" class="space-y-4">
                @foreach($avie->feedback as $index => $feedback)
                <div class="bg-gray-200 p-4 rounded-lg relative">
                    <label class="block text-sm font-semibold text-gray-700">Feedback Type:</label>
                    <select name="feedback[{{ $index }}][type]" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        @foreach($feedbackTypes as $type)
                        <option value="{{ $type->id }}" @if($type->id == $feedback->feedback_type_id) selected @endif>
                            {{ $type->title }}
                        </option>
                        @endforeach
                    </select>
                    <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700" onclick="removeFeedback(this)">✖</button>
                </div>
                @endforeach
            </div>

            <!-- Add Feedback Button -->
            <button type="button" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" onclick="addFeedback()">Add Feedback</button>

            <!-- Submit Button -->
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 w-full">Update Avie</button>
        </form>
    </div>

    <script>
        let feedbackIndex = {{ count($avie->feedback) }};

        function addFeedback() {
            const feedbackSection = document.getElementById('feedback-section');
            const newFeedback = document.createElement('div');
            newFeedback.classList.add('bg-gray-200', 'p-4', 'rounded-lg', 'relative');

            newFeedback.innerHTML = `
                <label class="block text-sm font-semibold text-gray-700">Feedback Type:</label>
                <select name="feedback[${feedbackIndex}][type]" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                    @foreach($feedbackTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                </select>
                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700" onclick="removeFeedback(this)">✖</button>
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
