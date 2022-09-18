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
        window.onload = () => {
            const form = document.querySelector("#searchdata");
            const searchContent = document.querySelector("#search-content");
            const forminput = document.querySelector("#floatingInputGroup2");
            let htmlSafe = null;
            form.addEventListener("submit", event => {
                event.preventDefault();
                console.log({
                    'htmlSafe' : htmlSafe,
                    'searchContent' : searchContent
                });
                if (forminput.value == '') {
                    if(htmlSafe) {
                        searchContent.innerHTML = htmlSafe;
                    }
                    return;
                }

                fetchAPI();
            });

            const fetchAPI = () => {
                fetch('http://localhost:8000/api/v1/communities', {
                    method: 'GET',
                    params: new FormData(form)
                })
                .then(data => data.json())
                .then(jsonResult => {
                    if (!htmlSafe) {
                        htmlSafe = searchContent.innerHTML;
                    }
                    searchContent.innerHTML = null;
                    console.log(jsonResult);
                });
            }
        }
    </script>
@endsection
