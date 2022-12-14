@extends('layouts.template')
@section('title', 'meetup')
@section('css')
    <style>
        h1 {
            background-color: #e5b045;
            color: rgb(33, 37, 41);
            margin: 1.5em;
        }

        h2 {
            background-color: rgb(33, 37, 41);
            color: #e5b045;
            border: 1px solid #e5b045;
        }

        #going {
            border: 1px solid #46E253;
            color: #46E253;
        }

        #maybe {
            border: 1px solid #e5b045;
            color: #e5b045;
        }

        #not {
            border: 1px solid #E04545;
            color: #E04545;
        }

        .cursive-text {
            font-style: italic;
            color: #FFFFFF44;
        }
    </style>
@endsection
@section('main')
    <div class='d-flex flex-column'>
        <div class='proj-card-title'><h1 class="rounded-pill px-3">{{$meetup->name}}</h1></div>
        <div class='d-flex flex-column align-items-center justify-content-center'>
            <div class='d-flex flex-row gap-5 my-3'>
                {{-- Img --}}
                <div class='d-flex flex-column'>
                    <img src='{{ asset('Assets/Images/' . $community?->img) }}' width='100px'>
                </div>
                {{-- Info column --}}
                <div class='d-flex flex-column mb-5'>
                    <div>{{$meetup->formattedDate}}</div>
                    <div>{{$community->name}}</div>
                    <div>
                        {{$location->name}}
                        <a href='{{route('location', ['id' => $location->id])}}' class='btn btn-dark'> <img src='{{asset('look_icon.svg')}}' height='30px'> See</a>
                    </div>
                    <div>{{$location->address_number}}, {{$location->address_road}} {{$location->address_city}}</div>
                </div>

                {{-- Notify form --}}
                <div class='d-flex flex-column'>
                    @if(count($user))
                        <div class='rounded-pill text-center my-3'
                        @if($user[0]->status == "Going")
                            id='going'
                        @elseif($user[0]->status == "Maybe")
                            id='maybe'
                        @else
                            id='not'
                        @endif
                        >{{ $user[0]->status }}</div>
                    @endif

                    <form method="post" class="input-group mb-3">
                        @csrf
                        <select class="form-select" id="inputGroupSelect02" name="status">
                            <option value="Going">Going</option>
                            <option value="Maybe">Maybe</option>
                            <option value="Can't go">Can't go</option>
                        </select>
                        <button type="submit" class="btn btn-secondary" id="inputGroupSelect02">Notify</button>
                    </form>
                </div>
            </div>
            <h2 class="rounded-pill px-3">Attendees</h2>
            <div id="proj-attendees-div" class="m-3">
                @if(count($usersInMeetups))
                    @foreach($usersInMeetups as $user)
                        @if($user->status == 'Going')
                            {{$user->name}},
                        @endif
                    @endforeach
                @else
                    <span class="cursive-text">None sofar</span>
                @endif
            </div>

            <h2 class="rounded-pill px-3">Description</h2>
            <div class='text-center m-3'>
                {{$meetup->desc}}
            </div>
        </div>
    </div>
@endsection
