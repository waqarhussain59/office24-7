<!DOCTYPE html>
<html lang="en">
<head>
    <title>Office Director Housing</title>
    <meta charset="utf-8">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            /*margin-bottom: 0;*/
            border-radius: 0;
            background-color: #66ff66;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #0680049e;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse"style="background-color:  rgba(35,169,14,0.62); margin-bottom: 0px !important;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/cda.jpg')}}" width="30" height="30" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav  text-white navbar-nav">
                <li><h4 class="text-white" style="margin-top: 20px !important;">Directorate of Housing Societies CDA</h4></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center" style="margin-left: 0px  !important;">
    <div class="row content">
        <div class="col-sm-2 sidenav"style="height: 208%;    padding-top: 3%;">
{{--            <p><a href="#">Link</a></p>--}}
{{--            <p><a href="#">Link</a></p>--}}
{{--            <p><a href="#">Link</a></p>--}}
        </div>
        <div class="col-sm-10 text-left">
            <main class="py-1">
                @yield('content')
            </main>
        </div>

    </div>
</div>

{{--<footer class="container-fluid text-center" style="    margin-top: 1%;">--}}

{{--</footer>--}}

</body>
</html>




