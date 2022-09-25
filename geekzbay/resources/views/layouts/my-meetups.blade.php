@extends('layouts.template')
@section('title', 'meetup')
@section('css')
    <style>
        h1 {
            color: #e5b045;
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

        .event-list>:nth-child(even) {
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
    <h1 class='m-1'>My Meetups</h1>
    {{-- Adaptive flex container --}}
    <div class='d-flex flex-adapt p-4 rounded gap-5'>
        {{-- Going box --}}
        <div class='h-100 w-100 d-flex flex-column align-items-center justify-content-center rounded-4 p-1 proj-going'>
            <h2>Going</h2>
            @if(count($myGoings))
                <table class='w-100'>
                    <tbody class='event-list'>
                        @foreach($myMaybes as $meetup)
                            <tr class='meetup-listing'>
                                <td>{{$meetup->meetup_name}}</td>
                                <td>{{$meetup->location_name}}</td>
                                <td>{{$meetup->date}}</td>
                                <td width='50px' height='35px'>
                                    <a class='btn btn-dark view-link' href='{{route('meetups', ['id' => $meetup->meetup_id])}}'>
                                        <img src='{{asset('look_icon.svg')}}' height='20px'>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <table class='w-100'>
                    <tbody class='event-list'>
                        @foreach($myMaybes as $meetup)
                            <tr class='meetup-listing'>
                                <td>{{$meetup->meetup_name}}</td>
                                <td>{{$meetup->location_name}}</td>
                                <td>{{$meetup->date}}</td>
                                <td width='50px' height='35px'>
                                    <a class='btn btn-dark view-link' href='{{route('meetups', ['id' => $meetup->meetup_id])}}'>
                                        <img src='{{asset('look_icon.svg')}}' height='20px'>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <table class='w-100'>
                    <tbody class='event-list'>
                        @foreach($myMaybes as $meetup)
                            <tr class='meetup-listing'>
                                <td>{{$meetup->meetup_name}}</td>
                                <td>{{$meetup->location_name}}</td>
                                <td>{{$meetup->date}}</td>
                                <td width='50px' height='35px'>
                                    <a class='btn btn-dark view-link' href='{{route('meetups', ['id' => $meetup->meetup_id])}}'>
                                        <img src='{{asset('look_icon.svg')}}' height='20px'>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class='d-flex flex-row align-items-center justify-content-center'>
                    <span>Nothing in here yet.</span>
                </div>
            @endif
        </div>

    </div>
@endsection
