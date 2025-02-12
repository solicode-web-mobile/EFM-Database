<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <x-navbar></x-navbar>
    <h1 class="m-4 ">Affiche l'article</h1>
    <div class="container">
            <h3>Titre : {{ $article->title }}</h3>

            <h2>Categories :</h2>
            @foreach($article->categories as $category)
                <p>{{ $category->name }}</p>
            @endforeach
    </div>
</body>
</html>