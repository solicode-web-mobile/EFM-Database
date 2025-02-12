<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>les articles</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <x-navbar></x-navbar>
    <h1 class="m-4 ">Les articles</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Nom de l’auteur </th>
            <th scope="col">Nombre de vues de l’article</th>
            <th scope="col">catégories de l’article</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
              <th scope="row">{{ $article->id }}</th>
              <th scope="row">{{ $article->title }}</th>
              <td>{{ $article->user->name }}</td>
              <td>{{ $article->view_counter }}</td>
              <td>
                @foreach ($article->categories as $category)
                <span class="badge {{ ($category->name == 'Populaire') ? 'badge-primary' : 'badge-secondary' }}">{{ $category->name }}</span>
                @endforeach
              </td>
              <td>
                <button type="button" class="btn btn-secondary">View</button>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <select class="form-control choices-multiple" multiple>
        <option></option>
        <option value="AZ">Arizona</option>
        <option value="CO">Colorado</option>
        <option value="ID">Idaho</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NM">New Mexico</option>
        <option value="ND">North Dakota</option>
        <option value="UT">Utah</option>
        <option value="WY">Wyoming</option>
      </select>
</body>
<script>
</script>
</html>
