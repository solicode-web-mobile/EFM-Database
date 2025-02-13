<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header class="bg-white shadow">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="flex flex-1 justify-end">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Stephan Hyatt</a>
            </div>
        </nav>
    </header>

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Liste des Stratégies</h2>

            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Titre</th>
                        <th class="border border-gray-300 px-4 py-2">Utilisateur</th>
                        <th class="border border-gray-300 px-4 py-2">Contenu</th>
                        <th class="border border-gray-300 px-4 py-2">Avis</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($strategies as $strategy)
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 font-bold">{{ $strategy->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $strategy->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $strategy->content }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @foreach($strategy->avie as $avie)
                                    <div class="mb-2">
                                        <p><strong>{{ $avie->user->name }}:</strong> {{ $avie->content }}</p>
                                        <p class="text-sm text-gray-600">
                                            Feedback: 
                                            @foreach($avie->feedback as $feedback)
                                                <span class="bg-gray-200 px-2 py-1 rounded-full inline-block">{{ $feedback->feedbackType->title }}</span>
                                            @endforeach
                                            @if($avie->valid)
                                                <span class="bg-green-200 px-2 py-1 rounded-full inline-block">Validé</span>
                                            @endif
                                        </p>
                                    </div>
                                @endforeach
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                @foreach($strategy->avie as $avie)
                                    <div class="flex gap-2 mb-2">
                                        <a href="{{ route('avie.edit', $avie) }}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded-lg text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('avie.destroy', $avie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this avie?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-lg text-xs">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>
