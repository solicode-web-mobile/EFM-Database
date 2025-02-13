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
    <h1 class="m-4 ">Edit article</h1>
    <div class="container">
        <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $article->title }}">
            </div>
            <div class="mb-3">
                <select class="form-select" name="categories[]" multiple aria-label="multiple select example">
                    <option>-------</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($article->categories->contains($category))>{{ $category->name }}</option>
                    @endforeach
                  </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>