<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Images</title>
</head>

<body>
<div class="container">
    <h1>Images</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Support Motivation</th>
                <th>Reactions</th>
                <th>Types of Motivation</th>
                <th>Image Views</th>
                <th>Support Motivation Views</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                @foreach ($image->supportMotivations as $supportMotivation) <!-- Using the correct variable name -->
                    <tr>
                        <td><img src="{{ asset($image->url) }}" alt="Image" width="100"></td>
                        <td>{{ $supportMotivation->content }}</td>
                        <td>{{ $supportMotivation->reactions }}</td>
                        <td>
                            @foreach ($supportMotivation->typeMotivations as $typeMotivation)
                                {{ $typeMotivation->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ $image->views }}</td>  

                        <td>{{ $supportMotivation->views }}</td>  
                        <td>
                            <a href="{{ route('images.show', $image->id) }}" class="btn">Details</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>


</body>

</html>