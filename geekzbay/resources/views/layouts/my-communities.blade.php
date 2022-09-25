@extends('layouts.template')
@section('title', 'My Communities')
@section('css')
    <link rel="stylesheet" href="/css/pages/my-communities.css">
@endsection
@section('main')
    <div class="my-communities d-flex gap-3 flex-wrap justify-content-center align-items-center p-5">
        @if ($myCommunities->count() > 0)
            @foreach ($myCommunities as $community)
                <div class="community w-25 mw-20 p-3 d-flex flex-column align-items-center justify-content-center gap-2">
                    <h3 class="name">{{ $community->name }}</h3>
                    <div class="w-100 d-flex justify-content-center">
                        <img class="communityImg w-50" src="../assets/images/{{ $community->img }}"
                            alt="{{ $community->name }}">
                    </div>
                    <div>
                        <p>{{ $community->desc }}</p>
                    </div>
                    <div class="discord">
                        <a href="{{ $community->discordLink }}">
                            <img class="discordIcon" src="../discord-icon.svg" alt="discord">
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="msg d-flex align-items-center">
                <p>You don't have any liked communities :(</p>
            </div>
        @endif
    </div>
@endsection
