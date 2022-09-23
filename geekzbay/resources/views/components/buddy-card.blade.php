<style>
    .card-img-top {
        width: 10rem;
        height: 10rem;
        margin: 1rem auto;
        border-radius: 50%;
    }
</style>
<div class="card" style="width: 18rem;">
    <img src="data:image/png;base64,{{ $imgSrc }}" class="card-img-top" alt="{{ $imgAlt }}">
    <div class="card-body">
        <div>
            <span class="name">{{ $username }}</span>
            {{-- If user has discord linked, show discord profile link --}}
            @if ($discordID)
                <a href="{{ "https://discord.com/users/$discordID" }}"><img class="discord_icon" src="discord-icon.svg"
                        alt="discord"></a>
            @endif
        </div>
        <p class="card-text">{{ $quote }}</p>
    </div>
    {{-- only show user's my-xxx pages, not the buddy's --}}
    @if ($self)
        <ul class="list-group list-group-flush bg-black">
            <li class="list-group-item"><a href="{{ route('my-meetups') }}">My Meetups</a></li>
            <li class="list-group-item"><a href="{{ route('my-buddies') }}">My Buddies</a></li>
            <li class="list-group-item"><a href="{{ route('my-communities') }}">My Communities</a></li>
            <li class="list-group-item"><a href="{{ route('my-locations') }}">My Locations</a></li>
        </ul>
    @endif
    <div class="card-body">
        {{-- Only show profile link of the user himself/herself --}}
        @if ($self)
            <a href="{{ route('my-profile') }}" class="card-link">Go to Profile</a>
        @endif
        {{-- Only show 'add buddy' button on buddy's card --}}
        @if (!$self)
            <button type="button" class="btn btn-warning addbuddy">
                <a href="{{ route('addBuddy', ['buddy_id' => $addBuddyId]) }}">Add Buddy</a>
            </button>
        @endif
    </div>
</div>
