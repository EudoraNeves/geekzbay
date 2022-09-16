@extends('layouts.template')

{{-- CSS --}}
@section('css')
    <link rel="stylesheet" href="/CSS/searchbarComm.css">
@endsection

@section('title', 'community')
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
@section('main')

    {{-- Searchbar --}}

    <form class="search-container d-flex flex-row justify-content-end my-3" id="searchdata" method="GET">
        @csrf
        <div class="input-group has-validation">
            <select class="form-select h-75 lh-1" id="floatingSelect" name="category"
                aria-label="Floating label select example">
                <option class="lh-1" value="1">Anime/Manga</option>
                <option class="lh-1" value="2">Movie/Series</option>
                <option class="lh-1" value="3">Comics</option>
                <option class="lh-1" value="4">Games</option>
                <option class="lh-1" value="5">Card Games</option>
                <option class="lh-1" value="6">Board Games</option>
            </select>
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid h-75" id="floatingInputGroup2" placeholder="Search">
                <label for="floatingInputGroup2" class="align-top lh-1">Search</label>
            </div>
            <input type="submit" class="input-group-text h-75" value="Search">
        </div>
    </form>

    {{-- Body --}}
    <div id="search-content">
        <h1> <i>Welcome to our Community Page</i></h1>
        <h2>Here you can find the community you are interested</h2>

    </div>

    <script>
        // Javascript to get the data from a PHP file with fetch
        window.onload = function() {
            const formdata = document.querySelector("#searchdata");
            const searchcontent = document.querySelector("#search-content");
            const forminput = document.querySelector("#floatingInputGroup2");
            let htmlsave = null;
            formdata.addEventListener("submit", function($event) {
                event.preventDefault();
                if (forminput.value == '' && htmlsave) {
                    searchcontent.innerHTML == htmlsave;

                }
            })

            function fetch() {
                fetch('searchDatabase.php')
                    .then(data => data.json)
                    .then(function(jsonResult) {
                        if (!htmlsave) {
                            htmlsave = searchcontent.innerHTML;
                        }
                        searchcontent.innerHTML = '';
                    })
            }
        }
    </script>
@endsection
