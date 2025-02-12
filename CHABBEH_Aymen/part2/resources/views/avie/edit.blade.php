<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Avie</h2>

        <form action="{{-- route('avies.update', $avie->id) --}}" method="POST">
            @csrf
            @method('PUT')

            <!-- Avie Content -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Avie Content:</label>
                <textarea name="content" rows="4" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content', $avie->content) }}</textarea>
                @error('content')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Feedback Section -->
            <h3 class="text-lg font-semibold text-gray-700 mt-6">Feedback:</h3>
            <div id="feedback-section">
                @foreach($avie->feedback as $index => $feedback)
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <label class="block text-sm font-semibold text-gray-700">Feedback Type:</label>
                    <select name="feedback[{{ $index }}][type]" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($feedbackTypes as $type)
                        <option value="{{ $type->id }}" @if($type->id == $feedback->feedback_type_id) selected @endif>
                            {{ $type->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>

            <!-- Add Feedback Button -->
            <button type="button" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" onclick="addFeedback()">Add Feedback</button>

            <!-- Submit Button -->
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Update Avie</button>
        </form>
    </div>
</div>

<script>
    let feedbackIndex = {{ count($avie->feedback) }};

    function addFeedback() {
        const feedbackSection = document.getElementById('feedback-section');
        const newFeedback = document.createElement('div');
        newFeedback.classList.add('mt-4', 'p-4', 'bg-gray-100', 'rounded-lg');

        newFeedback.innerHTML = `
            <label class="block text-sm font-semibold text-gray-700">Feedback Type:</label>
            <select name="feedback[${feedbackIndex}][type]" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($feedbackTypes as $type)
                <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>
        `;

        feedbackSection.appendChild(newFeedback);
        feedbackIndex++;
    }
</script>
</body>
</html>