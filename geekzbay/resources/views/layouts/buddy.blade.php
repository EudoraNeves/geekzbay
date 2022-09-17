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
        @if (Auth::check())
            <section class='findBuddy'>
                <div class="myProfile">
                    <x-buddy-card self="true" username="{{ Auth::user()->name }}" quote="{{ Auth::user()->name }}'s quote"
                        imgSrc="{{ Auth::user()->profilePicture }}" imgAlt="{{ Auth::user()->name }}'s profile photo" />
                </div>
                <div class="findBuddy_btn">
                    <button type="button" class="btn btn-warning"><a href="{{ route('buddy') }}">Find Buddy</a></button>
                </div>
                <div class="buddyProfile">
                    <x-buddy-card self="false" username="{{ $randomBuddy->name }}" quote="{{ $randomBuddy->name }}'s quote"
                        imgSrc="{{ $randomBuddy->profilePicture }}" imgAlt="{{ $randomBuddy->name }}'s profile photo" />
                </div>
            </section>
        @else
            <div>
                <p>Please log in first!</p>
            </div>
        @endif
    </div>
    {{-- <script>
        function fetchRandomBuddy() {
            window.location.reload();
        }
        let findBuddy_btn = document.querySelector('.findBuddy_btn > button');
        findBuddy_btn.addEventListener('click', fetchRandomBuddy);
    </script> --}}
@endsection
