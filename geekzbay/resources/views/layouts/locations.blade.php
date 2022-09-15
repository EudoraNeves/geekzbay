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
    locations Page

    <div class="d-flex flex-column align-items-center">
        <!-- Location card wrapper with location title: row -->
        <div class="d-flex flex-column">
            <h2>Respawn Bar Luxembourg</h2>

            <!-- Location card detail columns: row->column -->
            <div class="d-flex flex-row">
                <!-- Image and stars/likes: column -->
                <div class="d-flex flex-column">
                    <img src="https://respawn.lu/wp-content/uploads/2019/11/cropped-logo-1.png" alt="Shop picture" />
                    <!-- Stars and likes: rows -->
                    <div class="d-flex flex-row justify-content-around">
                        <a class="btn btn-dark">👎</a>
                        <meter min="0" max="100" low="35" high="75" value="80">
                            to be exchanged with ratings variable
                        </meter>
                        <a class="btn btn-dark">👍</a>
                    </div>
                </div>

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
                    </div>
                    <a href="" class="btn btn-dark">Go to website</a>
                </div>
            </div>
        </div>

        <div class="location-desc"></div>
    </div>

@endsection
