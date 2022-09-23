@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="/CSS/pages/home.css">
@section('title', 'Home')
@section('main')

    <div class="homepage">

        <h1 class="display-1" id="h1">Welcome to Geekzbay</h1>
        <h2 id="h2">The perfect place to meet other Geeks and friends</h2>
        <h3 id="h3">Don't forget to register to get full access &#x1F604;</h3>
        @if (!Auth::check())
            <button class="wellcome_btn">
                <a href="{{ route('register') }}"class="btn btn-dark">
                    <img src="/save_register.svg" /> <span>Register</span>

                </a>
            </button>
        @endif


    </div>


@endsection
