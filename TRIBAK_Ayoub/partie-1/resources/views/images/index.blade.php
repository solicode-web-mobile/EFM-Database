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
    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Image</th>
            <th>Employee</th>
            <th>Views</th>
            <th>Support Messages</th>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
            <tr>
                <td>
                    <img src="{{ $image->url }}" width="100" class="img-thumbnail">
                </td>
                <td>{{ $image->employe->name }}</td>
                <td>{{ $image->views }}</td>
                <td>
                    <ul class="list-unstyled">
                        @if($image->supportMotivations)
                            @foreach($image->supportMotivations as $support)
                                <li class="mb-2">
                                    {{ $support->content }} (Views: {{ $support->views }})
                                    <br>
                                    <strong>Types:</strong> {{ $support->typeMotivations->pluck('name')->join(', ') }}
                                </li>
                            @endforeach
                        @else
                            <li>No support messages available</li>
                        @endif
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

