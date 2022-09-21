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
                <h3>Here you can create your Event</h3>
                <form method="POST">
                    <input type="text" name="name" placeholder="Name your Event">
                    <input type="date" name="date">
                    <input type="text" name="location" placeholder="Location of your Event">
                    <input type="submit" value="Submit your event">
                </form>
            </div>
            <form method="get">
                @csrf
                <label>Search an Event</label><br>
                <input type="text" name="name" placeholder="Name"><br>
                <input type="date" name="date"><br>
                <input type="text" name="location" placeholder="Location"><br>
                <input type="submit" value="Submit">

            </form>
        </div>
        <div>
            <div>
                <div>Result</div>
            </div>
        </div>
    </div>
    <script></script>
@endsection
