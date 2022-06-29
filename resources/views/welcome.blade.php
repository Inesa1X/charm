<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
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
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('home')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white-700 dark:text-gray-500 ">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 ">Register</a>
                    @endif
                @endauth
                {{--    </div>--}}
            @endif
        </div>
    </div>
</div>



<div class="footer">
    <p>...</p>
</div>

</body>



</html>


