@extends('layouts.template')
@section('title', 'locations')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/pages/locations.css">
@endsection
@section('main')


    <form class="proj-search-container d-flex flex-row justify-content-centre flex-wrap my-3 mb-5" id="proj-search-data"
        method="GET">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" id="proj-name-input" placeholder="Search" aria-label="Name">
            <select class="form-select" id="proj-type-select" name="Type">
                <option class="lh-1" value="All">All</option>
                <option class="lh-1" value="Bar">Bar</option>
                <option class="lh-1" value="Cinema">Cinema</option>
                <option class="lh-1" value="Club">Club</option>
                <option class="lh-1" value="Library">Library</option>
                <option class="lh-1" value="Shop">Shop</option>
            </select>
        </div>

        <div class="input-group">
            <input type="number" class="form-control" id="proj-distance-input" placeholder="Km" aria-label="Distance">
            <select class="form-select" id="proj-city-select" name="city">
                @foreach ($addresses as $address)
                    <option class="lh-1" value="{{ $address->address_city }}">
                        {{ $address->address_city }} ({{ $address->locationSum }})
                    </option>
                @endforeach
            </select>

            <button type="submit" class="input-group-text btn btn-outline-light proj-button-gold"
                id="proj-submit">Submit</button>
        </div>
    </form>

    <div id="search-results" class='proj-comcard d-flex flex-adapt flex-wrap align-items-center justify-content-center gap-5'></div>

    <script>
        window.onload = () => {


            // Get the html
            const searchForm = document.querySelector('#proj-search-data');
            const nameSearch = document.querySelector('#proj-name-input');
            const typeSearch = document.querySelector('#proj-type-select');
            const distanceSearch = document.querySelector('#proj-distance-input');
            const townSearch = document.querySelector('#proj-city-select');
            const searchResults = document.querySelector('#search-results');

            // JS-PHP interface to get PHP array as JS array
            const cities = [
                @foreach ($addresses as $address)
                    '{{ $address->address_city }}',
                @endforeach
            ];


            // Fetch me the latitude and longitude of each city
            const citiesLatLon = {};
            cities.forEach(city => {
                const data = fetch(
                        `http://api.positionstack.com/v1/forward?access_key=a945723a7527b47523731b6b3a7fd503&query=${city}%20Luxembourg`
                    )
                    .then(data => data.json())
                    .then(obj => {
                        obj.data.forEach(fetchedCity => {
                            if (fetchedCity.type != 'locality' || fetchedCity.name != city) {
                                return;
                            }
                            citiesLatLon[city] = {
                                'lat': fetchedCity.latitude,
                                'long': fetchedCity.longitude
                            };
                        });
                    });
            });


            // Listen whether someone submits something
            searchForm.addEventListener('submit', (event) => {
                event.preventDefault();
                // Default distance is 0. If someone tries to be funny, negatives are not accepted and townSearch needs to be put in
                if(!distanceSearch.value)
                    distanceSearch.value = 0;
                if (townSearch.value == '' || distanceSearch.value < 0) {
                    return;
                }
                // Get all locations with the right name
                fetch(`http://localhost:8000/api/v1/locations?name=${nameSearch.value}&type=${typeSearch.value}`)
                    .then(data => data.json())
                    .then(jsonObj => {
                        const closeLocations = getCloseLocations(jsonObj);
                        console.log(closeLocations);
                        createHTML(closeLocations);
                        appendListeners(closeLocations);
                    });
            });

            // Show me all the locations in the nearby cities
            const getCloseLocations = (jsonObj) => {
                const closeLocationArray = [];
                // Create an array of filtered locations set nearby
                jsonObj.data.forEach(location => {
                    if (location.city in citiesLatLon) {
                        const latKm = citiesLatLon[location.city].lat - citiesLatLon[townSearch.value]
                            .lat;
                        const lonKm = citiesLatLon[location.city].long - citiesLatLon[townSearch.value]
                            .long;
                        if (111 * (latKm ** 2 + lonKm ** 2) ** 0.5 <= distanceSearch.value) {
                            closeLocationArray.push(location);
                        }
                    }
                });
                return closeLocationArray;
            }

            // Create the HTML objects and append the listener to favorite them
            const createHTML = (jsonResults) => {
                console.log(jsonResults);

                for(locationId in jsonResults) {
                    const location = jsonResults[locationId];
                    console.log(location);

                    searchResults.innerHTML += `
                        <div class="d-flex flex-column border border-warning rounded" id="proj-search-container">
                            <h2>${location.name}</h2>
                            <div class="d-flex flex-adapt">
                                <div class="proj-img d-flex flex-column align-items-center">
                                    <img src="${location.profilePicture}" width="150px">
                                    <div class="meter d-flex flex-row justify-content-around align-items-center border border-warning rounded mt-1">
                                        <a class="btn btn-dark">👎</a>
                                        <meter min="0" max="100" low="35" high="75" optimum="80" value="85"></meter>
                                        <a class="btn btn-dark">👍</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="proj-results-container info d-flex flex-column">
                                        <div><span>Town: </span>${location.city}</div>
                                        <div><span>Adress: </span>${location.number}, ${location.road}</div>
                                        <div><span>Type: </span>${location.type}</div>
                                    </div>
                                    <div class ="d-flex flex-row align-items-center justify-content-between">
                                            <img src="{{asset('heart_off.png')}}" class="btn btn-dark" id="heart_location_${locationId}" width="50px" />
                                            <a href="location/${location.id}" class="btn btn-dark">
                                                <img src="{{asset('look_icon.svg')}}" height="30px" />
                                                View
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }
            }


            const appendListeners = (jsonResults) => {
                for(locationId in jsonResults) {
                    const location = jsonResults[locationId];
                    document.getElementById(`heart_location_${locationId}`).addEventListener('click',
                    (e) => {
                        @if($user?->id)
                            if(e.target.src == '{{asset('heart_off.png')}}') {
                                e.target.src = '{{asset('heart_on.png')}}';
                            } else {
                                e.target.src = '{{asset('heart_off.png')}}';
                            }

                            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            fetch(`http://localhost:8000/api/locations/my-locations`, {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, *//*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method: 'post',
                                credentials: 'same-origin',
                                body: JSON.stringify({
                                    user_id: @json($user?->id),
                                    location_id: location.id
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
