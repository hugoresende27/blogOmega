<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ env('APP_NAME') }} v{{ env('APP_VERSION') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    

<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
{{-- <link href="/dist/output.css" rel="stylesheet"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}"> --}}

<link rel="stylesheet" href="{{ url('css/mystyle.css') }}">
<link rel="stylesheet" href="css/mystyle.css">
<link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}">
<link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}">

</head>
<body class="bg-black text-white h-screen antialiased leading-none font-sans ">
    <div >
        <header class="my-top-nav">
            <div class="">
                <div>

                    @if (isset(Auth::user()->level) && Auth::user()->level == 3)

                        <div class="admin-menu">
                            
                            
                
                                <div class="dropdown">
                                <button class="">
                                    <span class="">Administração</span>
                                    
                                </button>
                                <ul class="dropdown-menu ">
                                    <li class=""><a class="" href="/allusers">Users</a></li>
                                    <li class=""><a class="" href="/mailtemplate">Registration mail template</a></li>
                                    <li class=""><a class="" href="#">Three is the magic number</a></li>
                                </ul>
                                </div>
                            
                            
                        </div>
                      
                    @endif
                    @auth
                        
                    
                    <div class="text-center search-div">
                        <form action="{{ route('search') }}" method="GET">
                            {{ csrf_field() }}
                            <input type="text" name="search" required/>
                            <button type="submit" class="btn-procurar">Search</button>
                        </form>
                    </div>
                    {{-- <a href="/" class="my-links-nav ">
                        BLOG OMEGA HR
                    </a> --}}
                    @endauth
                </div>
        
        
              @include('layouts.nav')
            </div>
        </header>

            {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
            @if (session()->has('message'))
            <div id='hideMe'  >
                <p class="message-box">
                    {{ session()->get('message') }}
                </p>
            </div>
            @endif


        <div class="main-content">
             @yield('content')
        </div>


        <div>
             @include('layouts.footer')
        </div>


    </div>

      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>
<script>
    
function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
</html>
