<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="CSS/template.css" rel="stylesheet">
    @yield('css')

    <title>@yield('title')</title>
</head>

<body>
    <!-- Upper navbar -->
    <div class="header">
        <header>
            <nav class='p-0 m-0'>
                <div class="navbar d-flex flex-row text-decoration-none align-items-start flex-wrap p-0">
                    <a href="{{ route('home') }}" class="btn btn-dark">
                        <img src="/Geeks_bay_Logo.svg" height="100px" />
                    </a>
                    <a href="{{ route('buddy') }}" class="btn btn-dark">
                        <img src="/Buddy.svg" height="30px" />
                        Buddy
                    </a>
                    <a href="{{ route('meetup') }}" class="btn btn-dark">
                        <img src="/Evant.svg" height="30px" />
                        Meetup
                    </a>
                    <a href="{{ route('community') }}" class="btn btn-dark">
                        <img src="/community_icon.svg" height="30px" />
                        Community
                    </a>
                    <a href="{{ route('locations') }}" class="btn btn-dark">
                        <img src="/Local_icon1.svg" height="30px" />
                        Locations
                    </a>
            </nav>
        </header>
    </div>

    <!-- Account sidebar -->
    <div class="accountAccess rounded-end d-flex flex-column align-items-center align-content-center position-fixed z-10">
        <img src="profil.svg" alt="profilePhoto" height="100px">

        <a href="{{ route('profile') }}"class="btn btn-dark"><img src="/profil.svg" height="30px" />
            My Profile
        </a>

        <a href="{{ route('my-buddies') }}"class="btn btn-dark"><img src="/Buddy.svg" height="30px" />
            My Buddies
        </a>
        <a href="{{ route('home') }}"><a href="{{ route('my-meetups') }}"class="btn btn-dark">
            <img src="/Evant.svg" height="30px" />
            My Meetups
        </a>
        <a href="{{ route('home') }}"><a href="{{ route('my-locations') }}"class="btn btn-dark">
            <img src="/Local_icon1.svg" height="30px" />
            My Locations
        </a>

        <a href="{{ route('my-communities') }}" class="btn btn-dark">
            <img src="/community_icon.svg" height="30px" />
            My Communities
        </a>

        @if (!Auth::check())
            <div class="loggedOut">
                <div class="register">
                    <a href="{{ route('register') }}"class="btn btn-dark">
                        <img src="/Local_icon1.svg" height="30px" />
                        Register
                    </a>
                </div>
                <div class="login">
                    <a href="{{ route('login') }}" height="30px"class="btn btn-dark">
                        <img src="/login.svg" />
                        Login
                    </a>
                </div>
            </div>
        @else
            <div class="loggedIn">
                <div class="logout">Logout</div>
                <div class="deleteAccount">Delete Account</div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('main')
    </main>

    <!-- Footer -->
    <div class="footer">
        <footer>
            Footer
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
	    background-color: black;
        border: 1px solid green;
        width: 20%;
        z-index: 2;
        transform: translateX(-350px);
    }

    div.accountAccess:hover {
        animation: 1s ease-out 0s forwards running slidein;
    }

    @keyframes slidein {
        from {
            transform: translateX(-350px);
        }

        to {
            transform: translateX(-5px);
        }
    }
</style>

</html>
