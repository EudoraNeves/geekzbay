@extends('layouts.template')
@section('title', 'meetup')
@section('css')
    <style>
        h1 {
            background-color: #e5b045;
            color: rgb(33, 37, 41);
            margin: 1.5em;
        }

        .proj-going {
            border: 1px solid #46E253;
        }

        .proj-maybe {
            border: 1px solid #e5b045;
        }

        .proj-nope {
            border: 1px solid #E04545;
        }

        .flex-adapt {
            flex-direction: column;
        }

        .event-list>div:nth-child(even) {
            background-color: #FFFFFF22;
        }

        .view-link {
            display: none;
        }

        .meetup-listing:hover .view-link{
            display: inline;
        }

        @media(min-width: 1550px) {
            .flex-adapt {
                flex-direction: row;
            }
        }
    </style>
@endsection
@section('main')
    <h1>My Meetups</h1>
    {{-- Adaptive flex container --}}
    <div class='d-flex flex-adapt p-4 rounded gap-5'>
        {{-- Going box --}}
        <div class='h-100 w-100 d-flex flex-column align-items-center justify-content-center rounded-4 p-1 proj-going'>
            <h2>Going</h2>
            @if(count($myGoings))
            <div class='d-flex flex-column event-list'>
                @foreach($myGoings as $meetup)
                    <div class='d-flex flex-row justify-content-between align-items-center w-100 meetup-listing'>
                        <span>{{$meetup->meetup_name}}</span>
                        <span>{{$meetup->location_name}}</span>
                        <span>{{$meetup->date}}</span>
                        <div>
                            <a class='btn btn-dark view-link'>
                                <img src='{{asset('look_icon.svg')}}' height='20px'>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class='d-flex flex-row align-items-center justify-content-center'>
                    <span>Nothing in here yet.</span>
                </div>
            @endif
        </div>


        {{-- Maybe box --}}
        <div class='h-100 w-100 d-flex flex-column align-items-center justify-content-center rounded-4 p-1 proj-maybe'>
            <h2>Maybe</h2>
            @if(count($myMaybes))
            <div class='d-flex flex-column event-list'>
                @foreach($myMaybes as $meetup)
                    <div class='d-flex flex-row justify-content-between align-items-center w-100 meetup-listing'>
                        <span>{{$meetup->meetup_name}}</span>
                        <span>{{$meetup->location_name}}</span>
                        <span>{{$meetup->date}}</span>
                        <div>
                            <a class='btn btn-dark view-link' href='{{route('meetups', ['id' => $meetup->meetup_id])}}'>
                                <img src='{{asset('look_icon.svg')}}' height='20px'>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class='d-flex flex-row align-items-center justify-content-center'>
                    <span>Nothing in here yet.</span>
                </div>
            @endif
        </div>

        {{-- Not going box --}}
        <div class='h-100 w-100 d-flex flex-column align-items-center justify-content-center rounded-4 p-1 proj-nope'>
            <h2>Not going</h2>
            @if(count($myNopes))
                <div class='d-flex flex-column event-list'>
                    @foreach($myNopes as $meetup)
                        <div class='d-flex flex-row justify-content-between align-items-center w-100 meetup-listing'>
                            <span>{{$meetup->meetup_name}}</span>
                            <span>{{$meetup->location_name}}</span>
                            <span>{{$meetup->date}}</span>
                            <div>
                                <a class='btn btn-dark view-link'>
                                    <img src='{{asset('look_icon.svg')}}' height='20px'>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class='d-flex flex-row align-items-center justify-content-center'>
                    <span>Nothing in here yet.</span>
                </div>
            @endif
        </div>

    </div>
@endsection
