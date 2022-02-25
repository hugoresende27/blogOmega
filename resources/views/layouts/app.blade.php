<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ env('APP_NAME') }} v{{ env('APP_VERSION') }}1.3</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
{{-- <link href="/dist/output.css" rel="stylesheet"> --}}
<style>
    body { overflow-x: hidden; /* Hide scrollbars */ 
               
    
    }
    *{
        font-family: 'Roboto Condensed', sans-serif;
        /* font-family: 'Consolas',sans-serif; */
    }

    .minhaFont{
        font-family: 'Consolas',sans-serif;
        color:greenyellow;
    }

    input{
        color: #000;
    }
    .dropdown:hover .dropdown-menu {
  display: block;
}
</style>
</head>
<body class="bg-black text-white h-screen antialiased leading-none font-sans ">
    <div id="app">
        <header class="bg-dark py-6 ">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline minhaFont">
                        BLOG OMEGA HR
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">

                    @if (isset(Auth::user()->level) && Auth::user()->level == 3)

                        <div class="float-left">
                            
                            

                                <div class="dropdown inline-block relative">
                                  <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                    <span class="mr-1">Administração</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                  </button>
                                  <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                                    <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="allusers">Users</a></li>
                                    <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/mailtemplate">Registration mail template</a></li>
                                    <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Three is the magic number</a></li>
                                  </ul>
                                </div>
                              
                              
                        </div>
                    @endif
                
                    @guest
                        <a class="no-underline hover:underline minhaFont" href="{{ route('login') }}">{{ __('Login') }}</a>
                        {{-- @if (Route::has('register'))
                            <a class="no-underline hover:underline minhaFont" href="{{ route('register') }}">{{ __('Registar') }}</a>
                        @endif --}}
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
