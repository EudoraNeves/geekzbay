@extends('layouts.template')
@section('title', 'My Locations')
@section('css')
    <link rel="stylesheet" href="/css/pages/my-locations.css">
@endsection
@section('main')
    <div class='container d-flex flex-row justify-content-center align-items-center flex-wrap'>
        @foreach ($my_locations as $my_location)
            <div class="myLocation d-flex flex-adapt">
                <h1>{{ $my_location->name }}</h1>
                <div class="proj-img d-flex flex-adapt">
                    <div class="meter d-flex flex-row justify-content-around align-items-center border border-warning rounded mt-1">
                        <a class="btn btn-dark">👎</a>
                        <meter min="0" max="100" low="35" high="75" optimum="80" value="85"></meter>
                        <a class="btn btn-dark">👍</a>
                    </div>
                    <div class="proj-results-container info d-flex flex-column">
                        <div>{{ $my_location->address_city }}</div>
                        <div>{{ $my_location->address_number }}, {{ $my_location->address_road }}</div>
                        <div class ="d-flex flex-row align-items-center justify-content-between">
                                <img src="{{asset('heart_off.png')}}" class="btn btn-dark" id="heart_location_${locationId}" width="50px" />
                                <a href="location/${location.id}" class="btn btn-dark">
                                    <img src="{{asset('look_icon.svg')}}" height="30px" />
                                    View
                                </a>
                        </div>
                        <div>{{ $my_location->type }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




    <div class="d-flex flex-column border border-warning rounded" id="proj-search-container">
        <h2>${location.name}</h2>
        <div class="d-flex flex-adapt">
            <div class="proj-img d-flex flex-column align-items-center">
                <img src="${location.profilePicture}" width="150px">
                <div class="meter d-flex flex-row justify-content-around align-items-center border border-warning rounded mt-1">
                    <a class="btn btn-dark">👎</a>
                    <meter min="0" max="100" low="35" high="75" optimum="80" value="85"></meter>
                    <a class="btn btn-dark">👍</a>
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="proj-results-container info d-flex flex-column">
                    <div><span>Town: </span>${location.city}</div>
                    <div><span>Adresse: </span>${location.number}, ${location.road}</div>
                    <div><span>Type: </span>${location.type}</div>
                </div>
                <div class ="d-flex flex-row align-items-center justify-content-between">
                        <img src="{{asset('heart_off.png')}}" class="btn btn-dark" id="heart_location_${locationId}" width="50px" />
                        <a href="location/${location.id}" class="btn btn-dark">
                            <img src="{{asset('look_icon.svg')}}" height="30px" />
                            View
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
