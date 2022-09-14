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
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('buddy')}}">Buddy</a></li>
                    <li><a href="{{route('meetup')}}">Meetup</a></li>
                    <li><a href="{{route('community')}}">Community</a></li>
                    <li><a href="{{route('locations')}}">Locations</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="main">
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

</html>
