@extends('layouts.template')
@section('title', 'Profile')
@section('css')
    <link rel="stylesheet" href="css/pages/my-profile.css">
@endsection
@section('main')
    <div class="my-account d-flex flex-column justify-content-center flex-wrap align-items-center">
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
                <h2>My Discord :
                    <a href="{{ "https://discord.com/users/$user->discord_id" }}">
                        <img class="discord-icon"src="discord-icon.svg" alt="discord">
                    </a>
                </h2>
            </div>
        </div>

        <div class="security">
            <div class="title">
                <h2>Security</h2>
            </div>
            <form action="{{ route('change-password') }}" method="post" class="d-flex flex-column gap-2">
                @csrf
                <div><b>Password: </b><span class="showChangePassword">change password</span></div>
                <div class='hidden changePasswordChannel'>
                    <input type="text" id="password" name="password" placeholder="new password">
                    <input type="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        showChangePasswordChannel = (e) => {
            console.log('clicked');
            ChangePasswordChannel.classList.remove('hidden');
        }
        let showChangePassword = document.querySelector(".showChangePassword");
        let ChangePasswordChannel = document.querySelector('.changePasswordChannel');
        showChangePassword.addEventListener('click', showChangePasswordChannel);
    </script>
@endsection
