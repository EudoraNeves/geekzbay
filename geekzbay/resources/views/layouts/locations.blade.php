@extends('layouts.template')
@section('title', 'locations')
@section('css')
    <style>

    </style>
@endsection
@section('main')
    locations Page

    <!-- Location big card: row->column -->
    <div class="d-flex flex-row">
        <!-- Image and stars/likes: column -->
        <div class="d-flex d-column">
            <img src="" alt="" />
            <!-- Stars and likes: rows -->
            <div class="d-flex flex-row">

            </div>
        </div>

        <!-- Address stuff: column -->
        <div class="d-flex flex-column">
            <div>Town:</div>
            <div>Street:</div>
            <div>Number:</div>
            <div>Communities:</div>
            <a href='{{url()}}'>Go to website</a>
        </div>
    </div>

    <div class="location-desc"></div>

@endsection
