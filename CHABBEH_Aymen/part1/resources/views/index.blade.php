<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="">
        @foreach ($strategies as $strategy)

            <div class="">
                <div class="flex items-center gap-5">
                    <h1>{{ $strategy->title }}</h1>
                    <h2>{{$strategy->user->name}}</h2>
                </div>
                    <ul>
                        @foreach ($strategy->avie as $avie)
                        <li class="bg-blue-200"> 
                            {{ $avie->content }}
                            <div class="flex gap-6 rounded p-2">
                                @foreach($avie->feedback as $feed)
                                <div class="bg-gray-200">{{$feed->feedbackType->title}}</div>
                                @endforeach
                            </div>
                        </li>  
                        @endforeach
                    </ul>
            </div>
        @endforeach
    </body>
</html>
