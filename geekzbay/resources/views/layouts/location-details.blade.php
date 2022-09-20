@extends('layouts.template')
@section('title', 'locations')
@section('css')
    <style>
        .d-flex>.d-flex>img {
            width:150px;
        }

        .flex-adapt {
            flex-direction: column;
        }

        @media (min-width: 572px) {
            .flex-adapt {
                flex-direction: row
            }
        }
    </style>
@endsection
@section('main')
    <div class="d-flex flex-column align-items-center">
        <!-- Location card wrapper with location title: row -->
        <div class="d-flex flex-column my-5">
            <h2 class="text-center mb-4">{{$locationDetails->name}}</h2>

            <!-- Location card detail columns: row->column -->
            <div class="d-flex flex-adapt gap-3">

                <!-- Image and stars/likes: column -->
                <div class="d-flex flex-column justify-content-center alig-items-center">
                    <img src="{{$locationDetails->profilePicture}}" alt="Shop picture" />
                    <!-- Stars and likes: rows -->
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <a class="btn btn-dark">👎</a>
                        <meter min="0" max="100" low="35" high="75" optimum="80" value="85">
                            to be exchanged with ratings variable
                        </meter>
                        <a class="btn btn-dark">👍</a>
                    </div>
                </div>

                <!-- Second big column: make sure the links are at the bottom of the column while the data is at the top -->
                <div class="d-flex flex-column justify-content-between">
                    <!-- Address details: column>row to separate field name with field data -->
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between">
                            <span>Town:</span><span>{{$locationDetails->address_city}}</span>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <span>Street:</span><span>{{$locationDetails->address_road}}</span>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <span>Number:</span><span>{{$locationDetails->address_number}}</span>
                        </div>
                        <div>Communities:</div>
                        <div class="d-flex flex-row flex-md-wrap">
                            <!-- This is where the communities fetched from innerjoin with communities_in_locations innerjoined with locations will be displayed -->
                        </div>
                    </div>
                    <!-- End of Address details -->

                    <!-- Links -->
                    <div class="d-flex flex-row justify-content-between flex-md-wrap">
                        <a href="" class="btn btn-dark p-0">
                            <img src="/look_icon.svg" alt="Watch" height="20" />
                        </a>
                        <a href="{{$locationDetails?->homePage}}" class="btn btn-dark">Go to website</a>
                    </div>
                </div>
                <!-- End of second big column -->
            </div>
        </div>

        <div class="location-desc my-5 mx-md-5 mx-sm-1 text-center">
            <!-- This is where the bar is described -->
            {{$locationDetails->desc ?? ''}}
        </div>
    </div>
@endsection
