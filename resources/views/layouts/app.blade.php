<?php 
  function current_page($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('additional_css')
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{current_page('booking') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('bookings.index')}}">All Bookings</a>
                    </li>
{{--                    <li class="nav-item {{current_page('book') ? 'active' : ''}}">--}}
{{--                        <a class="nav-link" href="/">Book</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{current_page('cars/create') ? 'active' : ''}}">--}}
{{--                        <a class="nav-link" href="/cars/create">Create Cars</a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{current_page('cars') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('cars.index')}}">All Cars</a>
                    </li>
{{--                    <li class="nav-item {{current_page('locations/create') ? 'active' : ''}}">--}}
{{--                        <a class="nav-link" href="/locations/create">Create Locations</a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{current_page('locations') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('locations.index')}}">All Locations</a>
                    </li>
                </ul>
                {{-- <form class="form-inline my-2 my-lg-0">
                    
                </form> --}}
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
    <!-- Content -->
    @yield('content')
    <!-- Content -->
    <!-- Footer -->
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- Footer -->
    <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>




    @yield('additional_js')
</body>

</html>
