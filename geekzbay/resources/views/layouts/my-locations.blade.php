@extends('layouts.template')
@section('title', 'My Locations')
@section('css')
    <link rel="stylesheet" href="/css/pages/my-locations.css">
@endsection

@section('main')
    <div class='container d-flex flex-row justify-content-center align-items-center flex-wrap flex-solid'>
        @foreach ($my_locations as $my_location)
            <div class="myLocation d-flex flex-column m-5 border border-warning rounded p-3 w-50">
                <h1>{{ $my_location->name }}</h1>
                <div class="d-flex flex-adapt gap-3 justify-content-between">
                    {{-- Leftside column --}}
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="location_img" src="{{ $my_location->profilePicture }}">
                        <div class="meter d-flex flex-row justify-content-around align-items-center border border-warning rounded mt-1">
                            <a class="btn btn-dark">👎</a>
                            <meter min="0" max="100" low="35" high="75" optimum="80" value="85"></meter>
                            <a class="btn btn-dark">👍</a>
                        </div>
                    </div>
                    {{-- Rightside column --}}
                    <div class="d-flex flex-column gap-3">
                        <div><span>Town: </span>{{ $my_location->address_city }}</div>
                        <div><span>Adress: </span>{{ $my_location->address_number }}, {{ $my_location->address_road }}</div>
                        <div><span>Type: </span>{{ $my_location->type }}</div>
                        <div class ="d-flex flex-row align-items-center justify-content-end">
                            <a href="{{route('location' , ['id' => $my_location->id])}}" class="btn btn-dark">
                                <img src="{{asset('look_icon.svg')}}" height="30px" />
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
