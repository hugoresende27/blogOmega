<nav class="my-nav">


    @guest
        <a class="my-links-nav" href="{{ route('login') }}">{{ __('Login') }}</a>
        {{-- @if (Route::has('register'))
            <a class=" hov my-links-nav" href="{{ route('register') }}">{{ __('Registar') }}</a>
        @endif --}}
        <a class=" my-links-nav" href="/">Home</a>
        <a class=" my-links-nav" href="/blog">Blog</a>
    @else

        


        <span>Bem vindo  {{ Auth::user()->first_name }} </span>

        <a class="  my-links-nav" href="/profile/{{ Auth::user()->id }}">My Profile</a>
       
        <a class="  my-links-nav" href="/blog">Blog</a>

        <a href="{{ route('logout') }}"
           class="  my-links-nav"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest
</nav>