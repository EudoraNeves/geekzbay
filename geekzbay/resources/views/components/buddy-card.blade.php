<div class="card" style="width: 18rem;">
    <img src="data:image/png;base64,{{ $imgSrc }}" class="card-img-top" alt="{{ $imgAlt }}">
    <div class="card-body">
        <h5 class="card-title">{{ $username }}</h5>
        <p class="card-text">{{ $quote }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="{{ route('my-meetups') }}">My Meetups</a></li>
        <li class="list-group-item"><a href="{{ route('my-communities') }}">My Communities</a></li>
        <li class="list-group-item"><a href="{{ route('my-locations') }}">My Locations</a></li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Go to Profile</a>
        @if (!$self)
            <button type="button" class="btn btn-warning">Add Buddy</button>
        @endif
    </div>
</div>
