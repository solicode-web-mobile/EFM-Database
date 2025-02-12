<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Images & Support Messages</h2>
    
    <table class="table table-bordered">
        <thead class="table-dark">
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
                    <td class="text-center">
                        <img src="{{ $image->url }}" width="80" class="img-thumbnail">
                    </td>
                    <td>{{ $image->employe->name ?? 'N/A' }}</td>
                    {{-- <td class="text-center">{{ $image->views }}</td> --}}
                    <td>
                        <ul class="list-unstyled">
                            {{-- @forelse($image->supportMotivations as $support)
                                <li>
                                    {{ $support->content }} (views: {{ $support->views }})<br>
                                    <small class="text-muted">{{ $support->typeMotivations->pluck('name')->join(', ') }}</small>
                                </li>
                            @empty
                                <li>no Messages</li>
                            @endforelse --}}
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>