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

        <form method="get" id="search-form" class="d-none">
            @csrf
            <div><label>Search an Event</label></div>
            <div><input type="text" name="name" placeholder="Name" id="search-name-input"></div>
            <div><input type="date" name="date" id="search-start-date"></div>
            <div><input type="date" name="date" id="search-end-date"></div>
            <div><input type="text" name="location" placeholder="Location"></div>
            <div><input type="submit" value="Search" id="searchInput"></div>
        </form>

        <form method="post" id="create-form" class="d-none">
            @csrf
            <div><label>Create an Event</label></div>
            <div><input type="text" name="name" placeholder="Name"></div>
            <div><input type="date" name="date"></div>
            <div><input type="text" name="location" placeholder="Location"></div>
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

            // Display button listeners for toggling the search elements

            searchDisplayButton.addEventListener("click", (event) => {
                if(searchForm.className == 'd-none') {
                    searchForm.className = 'd-block';
                } else {
                    searchForm.className ='d-none';
                }
            });

            createDisplayButton.addEventListener("click", (event) => {
                if(createForm.className == 'd-none') {
                    createForm.className = 'd-block';
                } else {
                    createForm.className ='d-none';
                }
            });

            // Search button listeners for AJAX API calling
            searchForm.addEventListener('submit', (event) => {
                event.preventDefault();
            });

            const fetchAPI = () => {
                // API Querybuilder
                query = '?';
                if(searchNameInput.value != '') {
                    query += 'name=' + searchNameInput.value + '&';
                }
                if(searchStartDate.value) {
                    query += 'startDate=' + searchStartDate.value + '&';
                }
                if(searchEndDate.value) {
                    query += 'endDate=' + searchEndDate.value + '&';
                }
                fetch(`http:localhost:8000/api/v1/meetups${query}`)
                    .then(data => data.json())
                    .then(jsonObj => {

                    });
            }
/*
            // Search button listeners for AJAX API calling
            createForm.addEventListener('submit', (event) => {
                event.preventDefault();
                createData();
            });

            const createData = () => {

            }
*/
        }
    </script>
@endsection
