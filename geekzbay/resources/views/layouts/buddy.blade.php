@extends('layouts.template')
@section('title', 'buddy')
@section('css')
    <link rel="stylesheet" href="css/buddy.css">
@endsection
@section('main')
    <div class="container">
        <section class="status">
            {{-- @if (session('success'))
                <span style="color: green">{{ session('success') }}</span>
            @elseif(session('error'))
                <span style="color: red">{{ session('error') }}</span>
            @endif --}}
        </section>
        <section class='findBuddy'>
            @if (Auth::check())
                <div class="myProfile">
                    <x-buddy-card self="true" username="{{ Auth::user()->name }}" quote="{{ Auth::user()->name }}'s quote"
                        imgSrc="{{ Auth::user()->profilePicture }}" imgAlt="{{ Auth::user()->name }}'s profile photo"
                        addBuddyId="{{ $randomBuddy->id }}" />
                </div>
            @endif
            <div class="findBuddy_btn">
                <button type="button" class="btn btn-warning">Find Buddy</button>
            </div>
            <div class="buddyProfile hidden">
                <x-buddy-card self="false" username="{{ $randomBuddy->name }}" quote="{{ $randomBuddy->name }}'s quote"
                    imgSrc="{{ $randomBuddy->profilePicture }}" imgAlt="{{ $randomBuddy->name }}'s profile photo"
                    addBuddyId="{{ $randomBuddy->id }}" />
                {{-- addBuddy_href="{{route('addBuddy'), ['id' => $randomBuddy->id]}}" --}}
            </div>
            <div class="card question-mark" style="width: 18rem;">
                ?
            </div>
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
