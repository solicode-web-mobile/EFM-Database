<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Titre</td>
            <td>Auteur</td>
            <td>Vues</td>
            <td>Commentaires</td>
            <td>Catégories</td>
        </tr>
        @foreach ($articles as $article )
            
       
        <tr>
            <td>{{$article->title}}</td>
            <td>{{$article->user->name}}</td>
            <td>{{$article->views}}</td>
            <td>
                <ul>
                    @foreach ($article->comments as $comment)
                        <li>{{ $comment->content}} </li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>
                    @foreach ($article->categories as $categorie)
                        <li>{{ $categorie->name}} </li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>