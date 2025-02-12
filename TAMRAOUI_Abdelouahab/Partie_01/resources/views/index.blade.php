<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>les articles</title>
    <link rel="stylesheet" href="../Partie_02/public/bootstrap/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Articles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
                </li>
            </ul>
        </div>
      </nav>
    <h1 class="m-4 ">Les articles</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Nom</th>
            <th scope="col">exemple</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
              <th scope="row">{{$article->id}}</th>
              <th scope="row">{{$article->title}}</th>
              <th scope="row">{{$article->user->name}}</th>
              <th scope="row">
                @foreach($article->categories as $categorie)
                    <li>{{$categorie->name}}</li>
                @endforeach
              </th>
              <td><button>view</button></td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
<script>
</script>
</html>
