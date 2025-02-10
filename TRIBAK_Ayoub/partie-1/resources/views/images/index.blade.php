<table>
    <thead>
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
                <td><img src="" width="100"></td>
                <td>{{ $image->employee->name }}</td>
                <td>{{ $image->views }}</td>
                <td>
                    <ul>
                        @foreach($image->supportMotivation as $support)
                            <li>
                                {{ $support->message }} (Views: {{ $support->views }})
                                - Types: {{ $support->typeMotivation->pluck('name')->join(', ') }}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
