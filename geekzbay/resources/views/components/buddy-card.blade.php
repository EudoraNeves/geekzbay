<div class="card" style="width: 18rem;">
    <img src="data:image/png;base64,{{ $imgSrc }}" class="card-img-top" alt="{{ $imgAlt }}">
    <div class="card-body">
        <h5 class="card-title">{{ $username }}</h5>
        <p class="card-text">{{ $quote }}</p>
    </div>
    <ul class="list-group list-group-flush bg-black">
        <li class="list-group-item"><a href="{{ route('my-meetups') }}">My Meetups</a></li>
        <li class="list-group-item"><a href="{{ route('my-buddies') }}">My Buddies</a></li>
        <li class="list-group-item"><a href="{{ route('my-communities') }}">My Communities</a></li>
        <li class="list-group-item"><a href="{{ route('my-locations') }}">My Locations</a></li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Go to Profile</a>
        @if (!$self)
            <button type="button" class="btn btn-warning"><a
                    href="{{ route('addBuddy', ['buddy_id' => $addBuddyId]) }}">Add Buddy</a></button>
        @endif
    </div>
</div>
{{-- <script>
    function addBuddy(e){

    }
    let addBuddy_Btn = document.querySelector('.addBuddy_btn')
    addBuddy_Btn.addEventListener('click', addBuddy)
</script> --}}
