<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="CSS/template.css" rel="stylesheet">
    @yield('css')

    <title>@yield('title')</title>
</head>

<body>
    <!-- Upper navbar -->
    <div class="header">
        <header>
            <nav class="d-flex flex-column align-items-start z-10 p-0 m-0">
                <div class="btn btn-dark sticky-header d-flex flex-row justify-content-between align-items-start">
                    <a href="{{ route('home') }}" class="btn btn-dark z-10">
                        <img src="/Geeks_bay_Logo.svg" height="100px" />
                    </a>
                    <a class="burger m-auto" id="burger">
                        <img src="/Burger_menu.svg" height="40px" width="40" />
                    </a>
                </div>

                <!-- Dropdown menu -->
                <div id="nav_bare" class="nav_bare d-flex flex-row justify-content-between position-absolute" width="200px">

                    <!-- Account column -->
                    <div class="d-flex flex-column">
                        <img src="profil.svg" alt="profilePhoto" height="100px" />
                        <a href="{{ route('profile') }}"class="btn btn-dark">
                            <img src="/profil.svg" height="30px" />
                            My Profile
                        </a>
                        <a href="{{ route('my-buddies') }}"class="btn btn-dark">
                            <img src="/Buddy.svg" height="30px" />
                            My Buddies
                        </a>
                        <a href="{{ route('my-meetups') }}"class="btn btn-dark">
                            <img src="/Evant.svg" height="30px" />
                            My Meetups
                        </a>
                        <a href="{{ route('my-locations') }}"class="btn btn-dark">
                            <img src="/Local_icon1.svg" height="30px" />
                            My Locations
                        </a>
                        <a href="{{ route('my-communities') }}" class="btn btn-dark">
                            <img src="/community_icon.svg" height="30px" />
                            My Communities
                        </a>
                        <!-- Authentication checks -->
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
                                <div class="logout"><img src="/log_out.svg" />Logout</div>
                                <div class="deleteAccount"><img src="/delete.svg" />Delete Account</div>
                            </div>
                        @endif
                        <!-- End of Authentication checks -->
                    </div>
                    <!-- End of Account column -->

                    <!-- General links column -->
                    <span class="d-flex flex-column">
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
                    </div>
                    <!-- End of General links column -->
                </div>
            </nav>
        </header>
    </div>

    <!-- Account Sidebar
    <div class="main">
        <div class="accountAccess d-flex flex-column align-items-center align-content-center rounded-4 position-fixed">
            <img src="profil.svg" alt="profilePhoto" height="100px" />
            <a href="{{ route('profile') }}"class="btn btn-dark">
                <img src="/profil.svg" height="30px" />
                My Profile
            </a>
        </div>
    </div>
     -->
    <!-- Main data -->
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
    <script>
        document.getElementById('burger').onclick = function() {
            document.getElementById('nav_bare').classList.toggle('active');
        }
    </script>
</body>
<style>
    div.accountAccess {
	    background-color: black;
        border: 1px solid green;
        width: 20%;
        z-index: 2;
        transition: transform 700ms ease-out;
        transform: translateX(-350px);
    }

    div.accountAccess:hover {
        transform: translateX(-5px);
    }
</style>

</html>
