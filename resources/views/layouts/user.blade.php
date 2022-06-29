<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/card.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/salons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/salon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/booking.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mybookings.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">




</head>
<body>
<div id="app">
    <div class="header">
        <div class="main-name">
            <h1 class="logo"><a href="/">CHARM ROOM</a></h1>
        </div>
    </div>
    <div class="my-navbar">
        <div class="navbar-container">

            @foreach(\App\Models\Category::all() as $category)

                <div class="subnav">
                    <button class="subnavbtn">{{$category->title}} <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        @foreach($category->procedures as $procedure)
                            <a href="{{route('salons', $procedure->id)}}">{{$procedure->title}}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <a href="#contact">Contact</a>

            <div class="login">
                @if (Route::has('login'))

                    @auth


                        <div class="subnav">
                            <button class="subnavbtn">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></button>
                            <div class="subnav-content user">
                                @if(Auth::check() && Auth::user()->role_id == 2)
                                    <a class="dropdown-item" href="{{route('bookings')}}">All Bookings</a>
                                    <a class="dropdown-item" href="{{route('calendar')}}">Schedule</a>
                                @elseif(Auth::check() && Auth::user()->role_id == 3)
                                    <a class="dropdown-item" href="{{route('bookings')}}">My bookings</a>
                                @elseif(Auth::check() && Auth::user()->role_id == 1)
                                    <a class="dropdown-item" href="{{route('admin.user.index')}}">Admin</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white-700 dark:text-gray-500 ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 ">Register</a>
                        @endif
                    @endauth

                @endif
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
</div>





</body>
</html>
