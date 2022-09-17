@extends('layouts.template')
@section('title', 'My Buddies')
@section('main')
    @foreach ($myBuddies as $myBuddy)
        <div class="myBuddy">
            <span class="name">{{$myBuddy->name}}</span>
            <span class="birthDate">{{$myBuddy->birthDate}}</span>
            <img src="data:image/png;base64,{{$myBuddy->profilePicture}}" alt="">            
        </div>
    @endforeach
@endsection