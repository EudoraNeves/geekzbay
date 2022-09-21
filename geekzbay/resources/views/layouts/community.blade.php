@extends('layouts.template')

{{-- CSS --}}
@section('css')
    <link rel="stylesheet" href="/css/community.css">
    <link rel="stylesheet" href="/css/searchbarComm.css">
@endsection

@section('title', 'community')

@section('main')

    <form class="proj-search-container d-flex flex-row justify-content-end my-3 mb-5" id="proj-search-data" method="GET">
        @csrf
        <div class="input-group">
            <select class="form-select" id="proj-category-select" name="category" aria-label="Floating label select example">
                @foreach ($categories as $category)
                    <option class="lh-1" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" id="proj-text-input" placeholder="Search" aria-label="Search">
            <button type="submit" class="input-group-text btn btn-outline-light proj-button-gold"
                id="proj-submit">Submit</button>
        </div>
    </form>
    {{-- Body --}}
    <div id="proj-search-content">
        <h1> <i>Welcome to our Community Page</i></h1>
        <h2>Here you can find the community you are interested</h2>

    </div>

    <script>
        window.onload = () => {
            // Getting HTML elements
            const form = document.querySelector("#proj-search-data");
            const searchContent = document.querySelector("#proj-search-content");
            const selectionMenu = document.querySelector('#proj-category-select');
            const formInput = document.querySelector("#proj-text-input");
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

            // Search as soon as categories switch
            selectionMenu.addEventListener("input", event => {
                if (loadHTMLSafe(selectionMenu.value + '>' + formInput.value)) {
                    return;
                }
                fetchAPI();
            })

            // API fetching function
            const fetchAPI = () => {
                fetch(
                        `http://localhost:8000/api/v1/communities?category=${selectionMenu.value}&name=${formInput.value}`, {
                            mode: "cors"
                        })
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


            // loads up data from the safe to the page
            const loadHTMLSafe = safeKey => {
                // Check if the search query is empty. If so and you got the html landing page: restore
                if (formInput.value == '') {
                    if ('landingPage' in htmlSafe) {
                        searchContent.innerHTML = htmlSafe.landingPage;
                    }
                    return true;
                }
                // Restore the page if it already is in the htmlSafe
                if (safeKey in htmlSafe) {
                    searchContent.innerHTML = htmlSafe[safeKey];
                    return true;
                }
            }


            const createSearchResults = function(jsonResult) {
                if (!jsonResult.data.length) {
                    return '<div class="d-flex flex-row justify-content-center"> Sorry we could not find anything related to your research. Please try again!</div>';
                }
                let returnHTML = '<div class="d-flex flex-row flex-wrap" id="proj-results-container">';

                for (const result in jsonResult.data) {

                    returnHTML += `
                        <div class="d-flex proj-flex-adapt" id="proj-comcard">
                          ${ /* Left hand side of the card */'' }

<<<<<<< HEAD
                            <div class="proj-img" width="150px">
                                <img src="{{ asset('Assets/Images/${jsonResult.data[result].image}') }}" width="150px">
=======
                            <div class="proj-img" d-block" width="150px">
                                <img class="icon_img" src="{{ asset('Assets/Images/${jsonResult.data[result].image}') }}" width="150px">
>>>>>>> main
                            </div>

                           ${ /* Right hand side of the card */'' }

                            <div class="d-flex flex-column" id="proj_card_desc">
                                <div class="proj-name">
                                    ${jsonResult.data[result].name}
                                </div>
                                <div class="proj-categ d-flex flex-row justify-content-between">
                                    <div>Category: <span class="category_c">${jsonResult.data[result].category.name}<span></div></div>
                                    
                                </div>
                                 
                                
                                <div class="proj-desc d-flex flex-column">
                                    <div><span>Description:</span> <br>${(jsonResult.data[result].desc?.slice(0,200) ?? "")}</div>
                                </div>
                                <div class="proj-discord d-flex flex-row justify-content-between">
                                   
                                    <div >
                                        <a href="${jsonResult.data[result].discordLink}"" class=" btn btn-dark ">
                                            <img src="{{ asset('Discord_icon.svg') }}" height="30px">
                                            Discord
                                        </a>
                                    </div>
                                
                                </div>
                            </div>
                        </div>`;
                }

                returnHTML += '</div>';
                return returnHTML;
            }
        }
    </script>
@endsection
