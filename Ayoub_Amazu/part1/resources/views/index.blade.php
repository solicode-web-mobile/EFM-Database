<!DOCTYPE html>
<html>
<head>
    <title>Strategy Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Strategy Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Strategy Title</th>
                    <th>User</th>
                    <th>Avis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($strategies as $strategy)
                    <tr>
                        <td>{{ $strategy->title }}</td>
                        <td>{{ $strategy->user->name }}</td>
                       
                        <td>
                            @foreach($strategy->avie as $avie)
                            <li>
                            <strong>User Avis:</strong> {{  $avie->user->name }}<br>
                            <strong>Content:</strong> {{ $avie->content }}<br>
                            <strong>Feedback:
                                @foreach ($avie->feedback as $feedback )
                                </strong> {{ $feedback->feedbackType->title }} ,
                                
                            @endforeach
                            @if($avie->valid)
                                valide
                            @endif
                            </li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>