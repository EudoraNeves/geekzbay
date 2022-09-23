@extends('layouts.template')
@section('title', 'meetup')
@section('css')
    <style>
        .hiddenElement {
            display: none;
        }

        .flex-adapt {
            flex-direction: column;
        }

        @query(min-width: 768px) {
            .flex-adapt {
                flex-direction: row;
            }
        }
    </style>
@endsection
@section('main')
    <h1>My-Meetups</h1>

    <div id="results">
        @foreach ($mymeetups as $mymeetup)
            <div>Events I will join</div>
            <div>{{ $mymeetup }}</div>
        @endforeach
    </div>

@endsection
