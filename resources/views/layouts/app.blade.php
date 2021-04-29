<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7JEP9FDZ4Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7JEP9FDZ4Z');

    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('logo/logo iCare.png')}}" class="header-brand-img" style="border-radius: 50%; width:3.5em; height:auto;"> 
                   iCare
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/dass">DASS TEST</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/booking">BOOKING</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/contact">CONTACT US</a>
                        </li>
                    </ul>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(auth()->check()&& auth()->user()->role->name === 'student')
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('my.booking') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Bookings') }}</a>                
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chat" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Message') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my.report') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Reports') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/streaming') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('Video Meeting') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/chat') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('Chatting') }}</a>     
                </li>
                
            @endif

                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Dashboard') }}</a>     
                    </li>
                @endif

                @if(auth()->check()&& auth()->user()->role->name === 'counsellor')
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Dashboard') }}</a>     
                    </li>
                @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
