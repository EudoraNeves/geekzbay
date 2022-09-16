@extends('layouts.template')
@section('title', 'locations')
@section('css')
    <style>
        .d-flex>.d-flex>img {
            width:150px;
        }
    </style>
@endsection
@section('main')

    <div class="d-flex flex-column align-items-center">
        <!-- Location card wrapper with location title: row -->
        <div class="d-flex flex-column my-5">
            <h2 class="text-center">Respawn Bar Luxembourg</h2>

            <!-- Location card detail columns: row->column -->
            <div class="d-flex flex-row">

                <!-- Image and stars/likes: column -->
                <div class="d-flex flex-column me-4">
                    <img src="https://respawn.lu/wp-content/uploads/2019/11/cropped-logo-1.png" alt="Shop picture" />
                    <!-- Stars and likes: rows -->
                    <div class="d-flex flex-row justify-content-around">
                        <a class="btn btn-dark">👎</a>
                        <meter min="0" max="100" low="35" high="75" optimum="80" value="85">
                            to be exchanged with ratings variable
                        </meter>
                        <a class="btn btn-dark">👍</a>
                    </div>
                </div>

                <!-- Second big column: make sure the links are at the bottom of the column while the data is at the top -->
                <div class="d-flex flex-column justify-content-between ms-4">
                    <!-- Address details: column>row to separate field name with field data -->
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between">
                            <span>Town:</span><span>Luxembourg</span>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <span>Street:</span><span>Rue du Fort Neippeg</span>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <span>Number:</span><span>65</span>
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
                        <a href="" class="btn btn-dark">Go to website</a>
                    </div>
                </div>
                <!-- End of second big column -->
            </div>
        </div>

        <div class="location-desc my-5 mx-md-5 mx-sm-1 text-center">
            <!-- This is where the bar is described -->
            The Respawn bar in the center of Luxembourg the first e-sport and gaming bar in Luxembourg. 400 square meters dedicated to gaming in multiple spaces. Enjoy a drink with friends or colleagues while playing. We offer: 13 Board gaming tables, 2 Hexagonal premium gaming tables, 1 LAN area up to 10Pc, 4 Consoles spaces PS5,PS4,XboxSeries,Switch, 2 Battle boxes Guitare Hero and Kinect and 2 Wargaming tables.
        </div>
    </div>
@endsection
