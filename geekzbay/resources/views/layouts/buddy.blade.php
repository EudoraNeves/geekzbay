@extends('layouts.template')
@section('title', 'buddy')
@section('css')
    <link rel="stylesheet" href="css/pages/buddy.css">
@endsection
@section('main')
    <div class="container d-flex flex-row justify-content-center flex-wrap">
        <section class="status">
            @if (isset($buddyAdddedSuccessfully))
                <div>{{ $buddyAdddedSuccessfully }}</div>
            @endif
            @if (isset($noMoreBuddyToFind))
                <div class="noMoreBuddyToFind">{{ $noMoreBuddyToFind }}</div>
            @endif
            {{-- @if (session('success'))
                <span style="color: green">{{ session('success') }}</span>
            @elseif(session('error'))
                <span style="color: red">{{ session('error') }}</span>
            @endif --}}
        </section>
        <section class='findBuddy d-flex flex-row justify-content-center flex-wrap gap-3'>
            @if (isset($randomBuddy))
                @if (Auth::check())
                    <div class="myProfile">
                        <x-buddy-card self="true" username="{{ Auth::user()->name }}" quote="{{ Auth::user()->desc }}"
                            imgSrc="{{ Auth::user()->profilePicture }}" imgAlt="{{ Auth::user()->name }}'s profile photo"
                            addBuddyId="{{ $randomBuddy->id }}" discordID="{{ Auth::user()->discord_id }}" />
                    </div>
                @endif
                <div class="findBuddy_btn">
                    <button type="button" class="btn btn-warning">Find Buddy</button>
                </div>
                <div class="buddyProfile hidden">
                    <x-buddy-card self="false" username="{{ $randomBuddy->name }}" quote="{{ $randomBuddy->desc }}"
                        imgSrc="{{ $randomBuddy->profilePicture }}" imgAlt="{{ $randomBuddy->name }}'s profile photo"
                        addBuddyId="{{ $randomBuddy->id }}" discordID="{{ $randomBuddy->discord_id }}" />
                    {{-- addBuddy_href="{{route('addBuddy'), ['id' => $randomBuddy->id]}}" --}}
                </div>
            @endif
            @if (!isset($noMoreBuddyToFind))
                <div class="card question-mark" style="width: 18rem;">
                    ?
                </div>
            @endif
        </section>
    </div>
    <script>
        let buddyProfile = document.querySelector('.buddyProfile')
        let questionmark = document.querySelector('.question-mark')

        let hidden = true
        if (document.referrer === document.URL) {
            hidden = false
            buddyProfile.classList.remove('hidden')
            questionmark.classList.add('hidden')
        }

        function fetchRandomBuddy() {
            if (!hidden) {
                location.reload()
                //window.location.reload();
            } else {
                // hidden = false
                questionmark.classList.add('effect')
                setTimeout(() => {
                    hidden = false
                    buddyProfile.classList.remove('hidden')
                    questionmark.classList.add('hidden')
                }, 2000);
            }
        }
        let findBuddy_btn = document.querySelector('.findBuddy_btn > button');
        findBuddy_btn.addEventListener('click', fetchRandomBuddy);
    </script>
@endsection
