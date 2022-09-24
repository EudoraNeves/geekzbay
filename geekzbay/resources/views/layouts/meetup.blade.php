@extends('layouts.template')
@section('title', 'meetup')

@section('css')
    <link rel="stylesheet" href="/css/pages/meetup.css">
@endsection
@section('main')
    <div class="all">
        <div class="nave">
            <h1>Meetup</h1>
            <p>Use our Search function to look for a specific Event or use the date function to filter by date.</p>
            <div class="select_button">
                <button type="button" id="proj-search-display-btn" class="btn btn-secondary btn-lg">Search for Event</button>
                <button type="button" id="proj-create-display-btn" class="btn btn-secondary btn-lg">Create Event</button>
            </div>
        </div>
        <div class="search">
            {{-- Search form --}}
            <form method="get" id="search-form" class="d-none">
                @csrf
                <div><label>Search an Event</label></div>
                <div class="input-group"><input type="text" name="name" placeholder="Name" id="search-name-input">
                </div>
                <div><input type="date" name="date" id="search-start-date"></div>
                <div><input type="date" name="date" id="search-end-date"></div>
                <div>
                    <select name="location_id" id="location_search_id">
                        <option value="">All</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="community_id" id="community_search_id">
                        <option value="">All</option>
                        @foreach ($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div><input type="submit" value="Search" id="searchInput"></div>
            </form>

            {{-- Create form --}}
            <form method="post" id="create-form" class="d-none">
                @csrf
                <div><label>Create an Event</label></div>
                <div><input type="text" name="name" placeholder="Name" required></div>
                <div><input type="date" name="date" required></div>
                <div>
                    <textarea name="desc" required></textarea>
                </div>
                <div>
                    <select name="location_id" id="location_create_id" required>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>

                    <div>
                        <select name="community_id" id="comunity_create_id" required>
                            @foreach ($communities as $community)
                                <option value="{{ $community->id }}">{{ $community->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div><input type="submit" class="SYE" value="Submit your Event"></div>
            </form>

        </div>

        @if(null !== session()->get('success'))
            <div>{{session()->get('success')}}</div>
        @endif

        {{-- Search results --}}
        <div id="proj-search-content" class="flex-adapt flex-wrap align-items-center justify-content-center gap-2"></div>
    </div>
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
                if (searchForm.className == 'd-none') {
                    searchForm.className = 'd-block';
                    createForm.className = 'd-none';
                } else {
                    searchForm.className = 'd-none';
                }
            });

            createDisplayButton.addEventListener("click", (event) => {
                if (createForm.className == 'd-none') {
                    createForm.className = 'd-block';
                    searchForm.className = 'd-none';
                } else {
                    createForm.className = 'd-none';
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
                if (searchNameInput.value != '') {
                    query += 'name=' + searchNameInput.value + '&';
                }
                if (startDateInput.value) {
                    query += 'startDate=' + startDateInput.value + '&';
                }
                if (endDateInput.value) {
                    query += 'endDate=' + endDateInput.value + '&';
                }
                if (endDateInput.value) {
                    query += 'endDate=' + endDateInput.value + '&';
                }
                if (selectedLocation.value) {
                    query += 'location=' + selectedLocation.value + '&';
                }
                if (selectedCommunity.value) {
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
                    <div class='d-flex flex-column proj-card-border'>
                        ${/*Upper div-content: title*/''}
                        <div class='proj-card-title d-flex flex-row justify-content-between'>
                            <span>${meetup.name}</span>
                            <span>
                                <a href='{{ route('meetup') }}/${meetup.id}'>
                                    <img src='{{ asset('look_icon.svg') }}' />
                                    See
                                </a>
                            </span>
                        </div>
                        ${/*Lower div-content: data*/''}
                        <div class='d-flex flex-column'>
                            <div class='d-flex flex-adapt'>
                                ${/*Lefthand image column*/''}
                                <div class='d-flex flex-column gap-2'>
                                    <img src='{{ asset('Assets/Images/${meetup.community.img}') }}' width='100px'>
                                </div>
                                ${/*Righthand coordinates column*/''}
                                <div class='d-flex flex-column'>
                                    <div>${meetup.date}</div>
                                    <div>${meetup.community.name}</div>
                                    <div>${meetup.location.data.name} <a href='location/${meetup.location.data.id}'>See</a></div>
                                    <div>${meetup.location.data.address_number}, ${meetup.location.data.address_road} ${meetup.location.data.address_city}</div>
                                </div>
                            </div>
                            ${/*Bottom description box*/''}
                            <div class='text-center'>
                                ${meetup.desc.slice(0,100) + '...'}
                            </div>
                        </div>
                    </div>`;
                });

                return returnHTML;
            }
        }
    </script>
@endsection
