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
    <h1>Meetup</h1>
    <div class='d-flex flex-column'>
        <div class='proj-card-title'>{{$meetup->name}}</div>
        <div class='d-flex flex-adapt'>
            <div class='d-flex flex-row'>
                <div class='d-flex flex-column'>
                    <img src='{{ asset('Assets/Images/${meetup.community.img}') }}' width='100px'>
                </div>
                <div class='d-flex flex-column'>
                    <div>{{$meetup->date}}</div>
                    <div>{{$community->name}}</div>
                    <div>{{$location->name}} <a href='{{route('location', ['id' => $location->id])}}' class='btn btn-dark'>See</a></div>
                    <div>{{$location->address_number}}, {{$location->address_road}} {{$location->address_city}}</div>
                </div>
                <form method="post">
                    @csrf
                    <div>
                        <div>{{ $usersInMeetups?->status }}</div>
                        <select name="status">
                            <option value="Going">Going</option>
                            <option value="Maybe">Maybe</option>
                            <option value="Can't go">Can't go</option>
                        </select>
                        <button type="submit">Notify</button>
                    </div>
                </form>
            </div>
            <div class='text-center'>
                {{$meetup->desc}}
            </div>
        </div>
    </div>
@endsection
