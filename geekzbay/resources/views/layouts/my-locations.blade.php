@extends('layouts.template')
@section('title', 'My Locations')
@section('css')
    <link rel="stylesheet" href="/css/pages/my-locations.css">
@endsection
@section('main')
    <div class='container d-flex flex-row justify-content-center align-items-center flex-wrap'>
        @foreach ($my_locations as $my_location)
            <div class="myLocation d-flex flex-column">
                <h1>{{ $my_location->name }}</h1>
                <div class="d-flex flex-adapt">
                    <div class="d-flex flex-column">
                        <img class="location_img" src="{{ $my_location->profilePicture }}">
                        <meter min="0" max="100" low="35" high="75" optimum="80"
                            value="85"></meter>
                    </div>
                    <div class="d-flex flex-row justify-content-between gap-5 p-3">
                        <div class="d-flex flex-column gap-3">
                            <div>{{ $my_location->address_city }}</div>
                            <div>{{ $my_location->address_number }}, {{ $my_location->address_road }}</div>
                            <div>
                                <a href="{{ $my_location->homePage }}">website</a>
                            </div>
                            <div>{{ $my_location->type }}</div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
