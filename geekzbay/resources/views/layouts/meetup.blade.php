@extends('layouts.template')
@section('title', 'meetup')
@section('main')
    <div>
        <h1>Meetup</h1>
    </div>
    <div>
        <p>Use our Search function to look for a specific Event or use the date function to filter by date.</p>
    </div>
    <div>
        <div>
            <div>
                <button type="button" id="proj-create-btn" class="btn btn-secondary btn-lg">Create Event</button>
            </div>
        </div>
        <div class="search">
            <form method="get">
                @csrf
                <label>Search an Event</label><br>
                <input type="text" name="name" placeholder="Name"><br>
                <input type="date" name="date"><br>
                <input type="text" name="location" placeholder="Location"><br>
                <input type="submit" value="Search" id="searchInput">
            </form>
            <div>
                <div>
                    <div id="proj-search-content"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="proj-create-form">

    </div>
    <script>
        window.onload = () => {
            const create = document.getElementById("proj-create-btn");
            const createForm = document.getElementById("proj-create-form");
            create.addEventListener("click", (event) => {
                event.preventDefault();

                createForm.innerHTML = `
            <form method="get" id="create">
               @csrf
                    <label>Create an Event</label>
                    <div><input type="text" name="name" placeholder="Name"></div>
                    <div><input type="date" name="date"></div>
                    <div><input type="text" name="location" placeholder="Location"></div>
                    <div><input type="submit" value="Submit your Event"></div>
            </form>
                
                `;
            });
        }
    </script>
@endsection
