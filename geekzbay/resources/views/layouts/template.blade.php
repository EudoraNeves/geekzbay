<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

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
