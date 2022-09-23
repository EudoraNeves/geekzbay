@extends('layouts.template')
@section('title', 'Profile')
@section('css')
    <link rel="stylesheet" href="css/my-profile.css">
@endsection
@section('main')
    <div class="my-profile d-flex flex-column justify-content-center flex-wrap align-items-center">
        <div class="profile">
            <div class="title">
                <h2>Profile: </h2>
            </div>
            <div><img class="image" src="data:image/png;base64,{{ $user->profilePicture }}" alt=""></div>
            <div><b>Name: </b>{{ $user->name }}</div>
            <div><b>Email: </b>{{ $user->email }}</div>
            <div><b>Desc: </b>{{ $user->desc }}</div>
            <div><b>Birth Date: </b>{{ $user->birthDate }}</div>
            <a href="{{ route('my-profile.edit') }}">Edit</a></span>
        </div>
        <div class="links">
            <div class="title">
                <h2>My Discord : <a href="{{ "https://discord.com/users/$user->discord_id" }}"><img
                            class="discord-icon"src="discord-icon.svg" alt="discord"></a></h2>


            </div>

        </div>

        <div class="security">
            <div class="title">
                <h2>Security</h2>
            </div>
            <b>Password: </b><a href="{{ route('password.reset', ['token' => $user->remember_token]) }}">change password</a>
        </div>

    </div>
@endsection
<script>
    console.log($user);
</script>
