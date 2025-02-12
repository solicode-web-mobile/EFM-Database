<div class="container">
    <h1>Image Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $image->url }}</h3>
        </div>
        <div class="card-body">
            <img src="{{ asset($image->url) }}" alt="Image" width="100">
            <p><strong>Image Views:</strong> {{ $image->views }}</p>

            <h4>Support Motivations</h4>
            <ul>
                @foreach ($image->supportMotivations as $supportMotivation)
                    <li>
                        <p><strong>Message:</strong> {{ $supportMotivation->content }}</p>
                        <p><strong>Reactions:</strong> {{ $supportMotivation->reactions }}</p>
                        <p><strong>Views:</strong> {{ $supportMotivation->views }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <a href="{{ route('images.index') }}" class="btn btn-primary mt-3">Back to Images</a>
</div>
