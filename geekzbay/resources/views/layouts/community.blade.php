@extends('layouts.template')

{{-- CSS --}}
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/pages/community.css">
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

            //heart event related variables
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const user = {!! json_encode(Auth::user()) !!}


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
                fetch(`http://localhost:8000/api/v1/communities?category=${selectionMenu.value}&name=${formInput.value}`,
                {mode: "cors"})
                .then(data => data.json())
                .then(jsonResult => {
                    if (!('landingPage' in htmlSafe)) {
                        htmlSafe.landingPage = searchContent.innerHTML;
                    }
                    createSearchResults(jsonResult);
                    htmlSafe[selectionMenu.value + '>' + formInput.value] = searchContent.innerHTML;
                });
            }

            fetchAPI();


            const createSearchResults = function(jsonResult) {
                if (!jsonResult.data.length) {
                    searchContent.innerHTML = '<div class="d-flex flex-row justify-content-center"> Sorry we could not find anything related to your research. Please try again!</div>';
                    return
                }

                searchContent.innerHTML =  '<div class="d-flex flex-row flex-wrap" id="proj-results-container">';


                for(const result in jsonResult.data) {
                    console.log(`heart_community_${result}`);
                    searchContent.innerHTML += `
                        <div class="d-flex flex-row flex-wrap justify-content-center" id="proj-comcard">
                          ${ /* Left hand side of the card */'' }

                            <div class="proj-img" width="150px">
                                <img src="{{ asset('Assets/Images/${jsonResult.data[result].image}') }}" width="150px">
                            </div>

                           ${ /* Right hand side of the card */'' }

                            <div class="d-flex flex-column" id="proj_card_desc">
                                <h1>
                                    <div class="proj-name">

                                        ${jsonResult.data[result].name}

                                     </div>
                                </h1>
                                <div class="proj-categ d-flex flex-row justify-content-between">
                                    <div>Category: <span>${jsonResult.data[result].category.name}</span></div>

                                </div>
                                <div class="proj-desc d-flex flex-column">

                                <div><span>Description: </span>${(jsonResult.data[result].desc?.slice(0,200) ?? "")}</div>
                                </div>

                                <div class="proj-discord d-flex flex-row justify-content-between">
                                    <div class="discord" >
                                        <a href="${jsonResult.data[result].discordLink}"" class="btn btn-dark ">
                                            <img src="{{ asset('Discord_icon.svg') }}" height="30px">
                                            Discord
                                        </a>
                                    </div>
                                    <img src='{{ asset('heart_off.png') }}' id='heart_community_${result}' width='8%' height='8%'>
                                </div>
                            </div>
                        </div>`;
                }

                searchContent.innerHTML += '</div>';

                appendLikingListeners(jsonResult.data);
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


            const appendLikingListeners = (results) => {
                console.log(results);
                //heart event: add to my-communities
                for(result_id in results) {
                    const result = results[result_id];
                    const heartEl = document.getElementById(`heart_community_${result_id}`);
                    let isOn = false;

                    heartEl.addEventListener('click', (e) => {
                        @if($userId)
                            if(e.target.src == '{{asset('heart_off.png')}}') {
                                e.target.src = '{{asset('heart_on.png')}}';
                                isOn = true;
                            } else {
                                e.target.src = '{{asset('heart_off.png')}}';
                            }
                            console.log('red');
                            console.log(result.id);
                            fetch(`http://localhost:8000/api/my-communities/` + isOn ? 'add' : 'remove', {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method:  isOn ? 'post' : 'delete',
                                credentials: 'same-origin',
                                body: JSON.stringify({
                                    user_id: user.id,
                                    community_id: result.id
                                })
                            })
                            .then(data => {console.log('done!')})
                            .then(res => console.log(res))
                            .catch(err => console.log(err));
                        @else
                            window.location='{{ route('login') }}';
                        @endif
                    });
                }
            }
        }
    </script>
@endsection
