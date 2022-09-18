@extends('layouts.template')
@section('title', 'buddy')
@section('css')
    <link rel="stylesheet" href="css/buddy.css">
    <style>
        .hidden {
            display: none;
        }

        .effect {
            animation: blink 1s infinite;
        }

        .question-mark {
            font-size: 300px;
            font-weight: bold;
            text-align: center;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 100%;
            }
        }
    </style>
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
        @if (Auth::check())
            <section class='findBuddy'>
                <div class="myProfile">
                    <x-buddy-card self="true" username="{{ Auth::user()->name }}" quote="{{ Auth::user()->name }}'s quote"
                        imgSrc="{{ Auth::user()->profilePicture }}" imgAlt="{{ Auth::user()->name }}'s profile photo" />
                </div>
                <div class="findBuddy_btn">
                    <button type="button" class="btn btn-warning">Find Buddy</button>
                </div>
                <div class="buddyProfile hidden">
                    <x-buddy-card self="false" username="{{ $randomBuddy->name }}"
                        quote="{{ $randomBuddy->name }}'s quote" imgSrc="{{ $randomBuddy->profilePicture }}"
                        imgAlt="{{ $randomBuddy->name }}'s profile photo" />
                </div>
                <div class="card question-mark" style="width: 18rem;">
                    ?
                </div>
            </section>
        @else
            <div>
                <p>Please log in first!</p>
            </div>
        @endif
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
