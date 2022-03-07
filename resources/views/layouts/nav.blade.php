<nav class="my-nav">

    <a class=" my-links-nav" href="/">Home</a>
    <a class="  my-links-nav" href="/cinema">Movies</a>
    <a class=" my-links-nav" href="/blog">Reviews</a>


    @guest
        <a class="my-links-nav" href="{{ route('login') }}">{{ __('Login') }}</a>

    @else
        
  

        


       

        <a class="  my-links-nav" href="/profile/{{ Auth::user()->id }}">My Profile</a>
       
     

        <a href="{{ route('logout') }}"
           class="  my-links-nav"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest
</nav>