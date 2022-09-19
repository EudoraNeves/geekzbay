@extends('layouts.template')

{{-- CSS --}}
@section('css')
    <link rel="stylesheet" href="/CSS/searchbarComm.css">
@endsection

@section('title', 'community')
@section('main')

    {{-- Searchbar --}}

    <form class="search-container d-flex flex-row justify-content-end my-3" id="searchdata">
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
                <input type="text" name="input" class="form-control is-invalid h-75" id="floatingInputGroup2"
                    placeholder="Search">
                <label for="input" class="align-top lh-1">Search</label>
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
<<<<<<< Updated upstream
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
                } else {

                }
            })

            function fetch() {
                const fetchdata = new FormData(formdata);
                console.log(fetchdata);
                fetch('searchDatabase.php', {
                        method: 'POST',
                        body: fetchdata,
                    })
                    .then(data => data.json())
                    .then(function(jsonResult) {
                        if (!htmlsave) {
                            htmlsave = searchcontent.innerHTML;
                        }
                        searchcontent.innerHTML = '';
                    })
            }
        }
=======
        window.onload = () => {
                // Getting HTML elements
                const form = document.querySelector("#searchdata");
                const searchContent = document.querySelector("#search-content");
                const selectionMenu = document.querySelector('#floatingSelect');
                const formInput = document.querySelector("#floatingInputGroup2");
                let htmlSafe = {};


                // Appending form submit event listener: on void, restore html from html safe, else: fetch api
                form.addEventListener("submit", event => {
                    event.preventDefault();
                    if (loadHTMLSafe(selectionMenu.value + '>' + formInput.value)) {
                        return;
                    }
                    fetchAPI();
                });


                // Appending an automatic search that works 3 seconds behind the input
                formInput.addEventListener("input", event => {
                    // If it's already inside, no need to wait to load up
                    const query = selectionMenu.value + '>' + formInput.value;
                    if (loadHTMLSafe(query)) {
                        return;
                    }

                    // If it's not inside, go through the doSearch
                    setTimeout(() => {
                        if (query == selectionMenu.value + '>' + formInput.value) {
                            fetchAPI();
                        }
                    }, 3000);
                });


                // API fetching function
                const fetchAPI = () => {
                    fetch(
                            `http://localhost:8000/api/v1/communities?category=${selectionMenu.value}&name=${formInput.value}`
                        )
                        .then(data => data.json())
                        .then(jsonResult => {
                            if (!('landingPage' in htmlSafe)) {
                                htmlSafe.landingPage = searchContent.innerHTML;
                            }
                            searchContent.innerHTML = createSearchResults(jsonResult);
                            htmlSafe[selectionMenu.value + '>' + formInput.value] = searchContent.innerHTML;
                            console.log(jsonResult);
                        });
                }
                const createSearchResults = function(jsonResult) {
                        let returnHTML = '';
                        for (const result in jsonResult.data) {

                            jsonResult.data[].img
                            jsonResult.data[].name
                            jsonResult.data[].category
                            jsonResult.data[].discordLink

                            returnHTML += `
                        
                        <div class = "proj_card_desc" >
                            $ {
                                jsonResult.data[].img
                            }
                            $ {
                            jsonResult.data[].name
                            }
                            $ {
                            jsonResult.data[].category
                            }
                            $ {
                            jsonResult.data[].discordLink
                            } 
                        </div>
                    
                    }
                }
                `;
                            return returnHTML;

                            // loads up data from the safe to the page
                            const loadHTMLSafe = safeKey => {
                                    // Check if the search query is empty. If so and you got the html landing page: restore
                                    if (formInput.value == '') {
                                        if ('landingPage' in htmlSafe) {
                                            searchContent.innerHTML = htmlSafe.landingPage;
                                            return true;
                                        }
                                        re

                                        // Restore the page if it already is in the htmlSafe
                                        if (safeKey in htmlSafe) {
                                            searchContent.innerHTML = htmlSafe[safeKey];
                                            return true;

                                        }
                                    }
>>>>>>> Stashed changes
    </script>
@endsection
