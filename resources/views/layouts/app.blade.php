<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> BLOG OMEGA HR v1.2</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
<style>
    body { overflow-x: hidden; /* Hide scrollbars */ 
               
    
    }
    *{
        font-family: 'Roboto Condensed', sans-serif;
        /* font-family: 'Consolas',sans-serif; */
    }

    .minhaFont{
        font-family: 'Consolas',sans-serif;
    }

    input{
        color: #000;
    }
</style>
</head>
<body class="bg-gray-900 text-white h-screen antialiased leading-none font-sans ">
    <div id="app">
        <header class="bg-dark py-6 ">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline minhaFont">
                        BLOG OMEGA HR
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                
                    @guest
                        <a class="no-underline hover:underline minhaFont" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline minhaFont" href="{{ route('register') }}">{{ __('Registar') }}</a>
                        @endif
                        <a class="no-underline hover:underline  minhaFont" href="/">Home</a>
                        <a class="no-underline hover:underline minhaFont" href="/blog">Blog</a>
                    @else
                        <span>Bem vindo {{ Auth::user()->name }}</span>

                        <a class="no-underline hover:underline  minhaFont" href="/">Home</a>
                        <a class="no-underline hover:underline minhaFont" href="/blog">Blog</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline  minhaFont"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>


        <div>
             @yield('content')
        </div>


        <div>
             @include('layouts.footer')
        </div>


    </div>
</body>
</html>
