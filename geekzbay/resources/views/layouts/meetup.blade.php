@extends('layouts.template')
@section('title', 'meetup')
@section('css')
    <style>
        .hiddenElement {
            display: none;
        }

        .flex-adapt {
            flex-direction: column;
        }

        @query(min-width: 768px) {
            .flex-adapt {
                flex-direction: row;
            }
        }
    </style>
@endsection
@section('main')
    <h1>Meetup</h1>
    <p>Use our Search function to look for a specific Event or use the date function to filter by date.</p>
    <div>
        <button type="button" id="proj-search-display-btn" class="btn btn-secondary btn-lg">Search for Event</button>
        <button type="button" id="proj-create-display-btn" class="btn btn-secondary btn-lg">Create Event</button>
    </div>

    <div class="search">
        {{-- Search form --}}
        <form method="get" id="search-form" class="d-none">
            @csrf
            <div><label>Search an Event</label></div>
            <div class="input-group"><input type="text" name="name" placeholder="Name" id="search-name-input"></div>
            <div><input type="date" name="date" id="search-start-date"></div>
            <div><input type="date" name="date" id="search-end-date"></div>
            <div>
                <select name="location_id" id="location_search_id">
                    <option value="">All</option>
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="community_id" id="community_search_id">
                    <option value="">All</option>
                    @foreach($communities as $community)
                        <option value="{{$community->id}}">{{$community->name}}</option>
                    @endforeach
                </select>
            </div>
            <div><input type="submit" value="Search" id="searchInput"></div>
        </form>

        {{-- Create form --}}
        <form method="post" id="create-form" class="d-none">
            @csrf
            <div><label>Create an Event</label></div>
            <div><input type="text" name="name" placeholder="Name"></div>
            <div><input type="date" name="date"></div>
            <div>
                <textarea name="desc"></textarea>
            </div>
            <div>
                <select name="locatio_create_id" id="location_create_id">
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>

                <div>
                    <select name="community_create_id" id="comunity_create_id">
                        @foreach($communities as $community)
                            <option value="{{$community->id}}">{{$community->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div><input type="submit" value="Submit your Event"></div>
        </form>

    </div>

    <div id="proj-search-content"></div>

    <script>
        window.onload = () => {
            const searchDisplayButton = document.getElementById("proj-search-display-btn");
            const createDisplayButton = document.getElementById("proj-create-display-btn");
            const searchForm = document.getElementById("search-form");
            const searchNameInput = document.getElementById("search-name-input");
            const startDateInput = document.getElementById("search-start-date");
            const endDateInput = document.getElementById("search-end-date");
            const createForm = document.getElementById("create-form");

            const selectedLocation = document.getElementById("location_search_id");
            const selectedCommunity = document.getElementById("community_search_id");

            const searchContent = document.getElementById("proj-search-content");

            // Display button listeners for toggling the search elements
            searchDisplayButton.addEventListener("click", (event) => {
                if(searchForm.className == 'd-none') {
                    searchForm.className = 'd-block';
                    createForm.className ='d-none';
                } else {
                    searchForm.className ='d-none';
                }
            });

            createDisplayButton.addEventListener("click", (event) => {
                if(createForm.className == 'd-none') {
                    createForm.className = 'd-block';
                    searchForm.className ='d-none';
                } else {
                    createForm.className ='d-none';
                }
            });

            // Search button listeners for AJAX API calling
            searchForm.addEventListener('submit', (event) => {
                event.preventDefault();
                fetchAPI();
            });

            const fetchAPI = () => {
                // API Querybuilder
                let query = '?';
                if(searchNameInput.value != '') {
                    query += 'name=' + searchNameInput.value + '&';
                }
                if(startDateInput.value) {
                    query += 'startDate=' + startDateInput.value + '&';
                }
                if(endDateInput.value) {
                    query += 'endDate=' + endDateInput.value + '&';
                }
                if(endDateInput.value) {
                    query += 'endDate=' + endDateInput.value + '&';
                }
                if(selectedLocation.value) {
                    query += 'location=' + selectedLocation.value + '&';
                }
                if(selectedCommunity.value) {
                    query += 'community=' + selectedCommunity.value + '&';
                }
                console.log(query);
                fetch(`http://localhost:8000/api/v1/meetups${query}`)
                    .then(data => data.json())
                    .then(jsonObj => {
                        searchContent.innerHTML = createHTML(jsonObj);
                    });
            }

            const createHTML = (jsonObj) => {
                returnHTML = '';

                jsonObj.data.forEach(meetup => {
                    console.log(meetup);
                    returnHTML += `
                    <div class='d-flex flex-column'>
                        <div class='proj-card-title'>${meetup.name}</div>
                        <div class='d-flex flex-adapt'>
                            <div class='d-flex flex-row'>
                                <div class='d-flex flex-column'>
                                    <img src='{{ asset('Assets/Images/${meetup.community.img}') }}' width='100px'>
                                </div>
                                <div class='d-flex flex-column'>
                                    <div>${meetup.date}</div>
                                    <div>${meetup.community.name}</div>
                                    <div>${meetup.location.data.name} <a href='http://localhost:8000/location/${meetup.location.data.id}'>See</a></div>
                                    <div>${meetup.location.data.address_number}, ${meetup.location.data.address_road} ${meetup.location.data.address_city}</div>
                                </div>
                            </div>
                            <div class='text-center'>
                                ${meetup.desc}
                            </div>
                        </div>
                    </div>

                    `;
                });

                return returnHTML;
            }
        }
    </script>
@endsection
