@extends('layouts.template')
@section('title', 'buddy')
@section('css')
    <link rel="stylesheet" href="css/pages/buddy.css">
@endsection
@section('main')
    <div class="container d-flex flex-row justify-content-center flex-wrap">
        <section class="status">
            {{-- msg when adding buddy sucessfully --}}
            @if (isset($buddyAdddedSuccessfully))
                <div class="buddyAddedSuccessfully">{{ $buddyAdddedSuccessfully }}</div>
            @endif
            {{-- msg when user added all other users as buddies --}}
            @if (isset($noMoreBuddyToFind))
                <div class="noMoreBuddyToFind">{{ $noMoreBuddyToFind }}</div>
            @endif
        </section>
        <section class='findBuddy d-flex flex-row justify-content-center flex-wrap gap-3'>
            @if (isset($randomBuddy))
                {{-- Only show user profile when user logged in --}}
                {{-- user profile --}}
                @if (Auth::check())
                    <div class="myProfile">
                        <x-buddy-card self="true" username="{{ Auth::user()->name }}" quote="{{ Auth::user()->desc }}"
                            imgSrc="{{ Auth::user()->profilePicture }}" imgAlt="{{ Auth::user()->name }}'s profile photo"
                            addBuddyId="{{ $randomBuddy->id }}" discordID="{{ Auth::user()->discord_id }}" />
                    </div>
                @endif
                {{-- button 'Find Buddy' --}}
                <div class="findBuddy_btn">
                    <button type="button" class="btn btn-warning">Find Buddy</button>
                </div>
                {{-- buddy profile --}}
                <div class="buddyProfile hidden">
                    <x-buddy-card self="false" username="{{ $randomBuddy->name }}" quote="{{ $randomBuddy->desc }}"
                        imgSrc="{{ $randomBuddy->profilePicture }}" imgAlt="{{ $randomBuddy->name }}'s profile photo"
                        addBuddyId="{{ $randomBuddy->id }}" discordID="{{ $randomBuddy->discord_id }}" />
                </div>
            @endif
            {{-- buddy card view before clicking button --}}
            @if (!isset($noMoreBuddyToFind) && !isset($buddyAdddedSuccessfully))
                <div class="card question-mark" style="width: 18rem;">
                    ?
                </div>
            @endif
        </section>
    </div>
    <script>
        let buddyProfile = document.querySelector('.buddyProfile')
        let questionmark = document.querySelector('.question-mark')

        //when reloading
        let hidden = true
        if (document.referrer === document.URL) {
            hidden = false
            //hide buddy profile & show questionmark
            buddyProfile.classList.remove('hidden')
            questionmark.classList.add('hidden')
        }

        function fetchRandomBuddy() {
            if (!hidden) {
                location.reload()
            } else {
                questionmark.classList.add('effect')
                //set a timer to delay the buddy card (so as to put animation beforehead)
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
