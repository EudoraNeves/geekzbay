@extends('layouts.template')

{{-- CSS --}}
@section('css')
    <link rel="stylesheet" href="/CSS/searchbarComm.css">
@endsection

@section('title', 'community')

@section('main')

    <form class="search-container d-flex flex-row justify-content-end my-3" id="searchdata" method="GET">
        @csrf
        <div class="input-group has-validation">
            <select class="form-select h-75 lh-1" id="floatingSelect" name="category"
                aria-label="Floating label select example">
                @foreach ($categories as $category)
                    <option class="lh-1" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
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
        window.onload = () => {
            // Getting HTML elements
            const form = document.querySelector("#searchdata");
            const searchContent = document.querySelector("#search-content");
            const selectionMenu = document.querySelector('#floatingSelect');
            const formInput = document.querySelector("#floatingInputGroup2");
            let htmlSafe = {};

            // Appending form submit even listener: on void, restore html from html safe, else: fetch api
            form.addEventListener("submit", event => {
                event.preventDefault();

                // Check if the search query is empty. If so and you got the html landing page: restore
                if(formInput.value == '') {
                    if('landingPage' in htmlSafe) {
                        searchContent.innerHTML = htmlSafe.landingPage;
                    }
                    return;
                }

                // If the search was already submitted, just take it out of the safe, no fetching required
                const safeKey = selectionMenu.value + '>' + formInput.value;
                if(safeKey in htmlSafe) {
                    searchContent.innerHTML = htmlSafe[safeKey];
                    return;
                }

                fetchAPI();
            });


            // API fetching function
            const fetchAPI = () => {
                fetch(`http://localhost:8000/api/v1/communities?category=${selectionMenu.value}&name=${formInput.value}`)
                .then(data => data.json())
                .then(jsonResult => {
                    if(!('landingPage' in htmlSafe)) {
                        htmlSafe.landingPage = searchContent.innerHTML;
                    }
                    searchContent.innerHTML = jsonResult;
                    htmlSafe[selectionMenu.value + '>' + formInput.value] = searchContent.innerHTML;
                    console.log(jsonResult);
                });
            }
        }
    </script>
@endsection
