<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('buddy') }}">Buddy</a></li>
                    <li><a href="{{ route('meetup') }}">Meetup</a></li>
                    <li><a href="{{ route('community') }}">Community</a></li>
                    <li><a href="{{ route('locations') }}">Locations</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="main">
        <div class="accountAccess">
            <img src="" alt="profilePhoto">
            <ul>
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('my-buddies') }}">My Buddies</a></li>
                <li><a href="{{ route('my-meetups') }}">My Meetups</a></li>
                <li><a href="{{ route('my-locations') }}">My Locations</a></li>
                <li><a href="{{ route('my-communities') }}">My Communities</a></li>
            </ul>
            @if (!Auth::check())
                <div class="loggedOut">
                    <div class="register"><a href="{{ route('register') }}">Register</a></div>
                    <div class="login"><a href="{{ route('login') }}">Login</a></div>
                </div>
            @else
                <div class="loggedIn">
                    <div class="logout">Logout</div>
                    <div class="deleteAccount">Delete Account</div>
                </div>
            @endif
        </div>
        <main>
            @yield('main')
        </main>
    </div>
    <div class="footer">
        <footer>
            footer
        </footer>
    </div>
</body>
<style>
    body {
        border: 1px solid black;
    }

    div.accountAccess {
        border: 1px solid green;
        width: 20%;
    }
</style>

</html>
