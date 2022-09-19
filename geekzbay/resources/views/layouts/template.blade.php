<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    @yield('css')

    <title>@yield('title')</title>
</head>

<body>

    <!-- Upper navbar -->
    <div class="header-container">
        <header id="header">
            <div class="logo">
                <a href="{{ route('home') }}" class="btn btn-dark z-10">
                    <img src="/Geeks_bay_Logo.svg" height="100px" />
                </a>
            </div>
            <div class="quick_menu">
                <a class="profil" id="profil">
                    <img src="/profil.svg" height="30px" />
                    {{-- LOGO USER --}}
                </a>
                <a class="burger" id="burger">
                    <img src="/Burger_menu.svg" />
                </a>

                <a class="Login_logout">
                    @if (!Auth::check())
                        <button><img src="/log_out.svg" />Logout</button>
                    @else
                        <img src="/login.svg" />login
                    @endif
                </a>
            </div>
        </header>
        <div class="extended_menu" id="extended_menu">
            <div class="left">

            </div>
            <div class="right">
                <ul id="links">
                    <li>
                        <a href="{{ route('buddy') }}" class="btn btn-dark">
                            <img src="/Buddy.svg" height="30px" />
                            Buddy
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('meetup') }}" class="btn btn-dark">
                            <img src="{{ asset('Evant.svg') }}" height="30px" />
                            Meetup
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('community') }}" class="btn btn-dark">
                            <img src="/community_icon.svg" height="30px" />
                            Community
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('locations') }}" class="btn btn-dark">
                            <img src="/Local_icon1.svg" height="30px" />
                            Locations
                        </a>

                    </li>
                </ul>
            </div>


            {{-- <div>
            <nav class="d-flex flex-column align-items-start z-10 p-0 m-0">
                <div class="btn btn-dark sticky-header d-flex flex-row justify-content-between align-items-start">


                </div>

                <!-- Dropdown menu -->
                <div id="nav_bare" class="nav_bare d-flex flex-row justify-content-between position-absolute"
                    width="200px">

                    <!-- Account column -->
                    <div class="d-flex flex-column">
                        <img src="{{ asset('profil.svg') }}" alt="profilePhoto" height="100px" />
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
                            <img src="{{ asset('Evant.svg') }}" height="30px" />
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

            </nav>
        </div> --}}
        </div>
        <div class="extended_menu" id="extended_menu_profil">
            <div class="right">
                <ul>
                    <li>
                        <a href="{{ route('my-buddies') }}"class="btn btn-dark">
                            <img src="/Buddy.svg" height="30px" />
                            My Buddies
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('my-meetups') }}"class="btn btn-dark">
                            <img src="/Evant.svg" height="30px" />
                            My Meetups
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my-communities') }}" class="btn btn-dark">
                            <img src="/community_icon.svg" height="30px" />
                            My Communities
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my-locations') }}"class="btn btn-dark">
                            <img src="/Local_icon1.svg" height="30px" />
                            My Locations
                        </a>
                    </li>
                    <li>
                        <a href="" class="btn btn-dark">

                            <img src="/delete.svg" height="30px" />
                            Delete Account
                        </a>
                    </li>
            </div>
        </div>




        <!--<div class="register">
                <a href="{{ route('register') }}">
                    <img src="/Local_icon1.svg" height="30px" />
                    Register
                </a>
 -->
        <!-- End of Authentication checks -->


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
        <div class="content">
            <main>
                @yield('main')
            </main>
        </div>

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
            document.getElementById('profil').onclick = function() {
                document.getElementById('extended_menu_profil').classList.toggle('active');
                document.getElementById('extended_menu').classList.remove('active');
            }
            document.getElementById('burger').onclick = function() {
                document.getElementById('extended_menu').classList.toggle('active');
                document.getElementById('extended_menu_profil').classList.remove('active');
            }
        </script>
</body>

</html>
