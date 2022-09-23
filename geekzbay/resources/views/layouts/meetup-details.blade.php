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
                    <div>{{$meetu->community->name}}</div>
                    <div>{{$meetup->location->data->name}} <a href='{{route(location/$meetup->location->data->id)}}'>See</a></div>
                    <div>{{$meetup->location->data->address_number}}}, {{$meetup->location->data->address_road}} {{$meetup->location->data->address_city}}</div>
                </div>
                <div>
                    <select name="" id="">
                        <option value="Can&apos;t go">Can't go</option>
                        <option value="Maybe">Maybe</option>
                        <option value="Going">Going</option>
                    </select>
                </div>
            </div>
            <div class='text-center'>
                {{$meetup->desc}}
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
