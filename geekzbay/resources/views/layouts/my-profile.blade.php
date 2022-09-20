@extends('layouts.template')
@section('title', 'Profile')
@section('css')
    <link rel="stylesheet" href="css/my-profile.css">
@endsection
@section('main')
    <div class="my-profile">
        <div class="profile">
            <div class="title">
                <h2>Profile &nbsp;<span class="edit"><a href="{{route('my-profile.edit')}}">Edit</a></span></h2>
            </div>
            <div><b>Profile Picture: </b><img class="image" src="data:image/png;base64,{{ $user->profilePicture }}" alt=""></div>
            <div><b>Name: </b>{{ $user->name }}</div>
            <div><b>Email: </b>{{ $user->email }}</div>
            <div><b>Desc: </b>{{ $user->desc }}</div>
            <div><b>Birth Date: </b>{{ $user->birthDate }}</div>
        </div>
        <div class="security">
            <div class="title">
                <h2>Security</h2>
            </div>
            <b>Password: </b><a href="{{ route('password.email', ['token' => $user->remember_token]) }}">change password</a>
        </div>

    </div>
@endsection
<script>
    console.log($user);
</script>
