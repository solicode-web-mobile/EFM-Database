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
    {{-- <header class="bg-white shadow">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Features</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
    </header> --}}

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Strategies</h2>
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left text-black">Strategy Title</th>
                        <th class="border border-gray-300 px-4 py-2 text-left text-black">Author</th>
                        <th class="border border-gray-300 px-4 py-2 text-left text-black">Content</th>
                        <th class="border border-gray-300 px-4 py-2 text-left text-black">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($strategies as $strategy)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-black">{{ $strategy->title }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-black">{{ $strategy->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-black">{{ $strategy->content }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-black  ">
                            <ul>
                                @foreach($strategy->avie as $avie)
                                <li class="mb-2">
                                    <strong>{{ $avie->user->name }}:</strong> {{ $avie->content }}
                                    <ul class="mt-1">
                                        @foreach($avie->feedback as $feedback)
                                        <li class="text-sm text-gray-600 bg-gray-200 px-3 py-1 rounded-full inline-block">
                                            {{ $feedback->feedbackType->title }}
                                        </li>
                                        @endforeach
                                        @if($avie->valid)
                                            <li class="text-sm text-gray-600 bg-green-300 px-3 py-1 rounded-full inline-block">
                                                Valid
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
