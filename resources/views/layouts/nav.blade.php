<style>
  

    /* nav {
      display: block;
      width: 960px;
      margin: 100px auto;
      text-align: center;
    } */
    nav ul {
      list-style: none;
    }
    nav li {
      display: inline-block;
    }
 
    nav a:hover {
      border: 1px solid red;
      background: red;
    }
    nav a:active {
      background: blue;
    }
    nav select {
      display: none;
    }
    
    @media (max-width: 960px) {
      nav ul     { display: none; }
      nav select { display: inline-block; }
    }
	
	</style>
	
	<!-- You COULD just put both menus in the markup,
	     but if you don't like that, this is how you
	     could dynamically create it with jQuery.  -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });
	</script>


<nav class="my-nav ">
<ul>

    <li><a class=" my-links-nav" href="/">Home</a></li>
    <li><a class="  my-links-nav" href="/cinema">Movies</a></li>
    <li><a class=" my-links-nav" href="/blog">Reviews</a></li>

    
    
    


    @guest
  <li>   <a class="my-links-nav" href="{{ route('login') }}">{{ __('Login') }}</a></li>   

    @else
        
  

        


       

     <li>  <a class="  my-links-nav" href="/profile/{{ Auth::user()->id }}">My Profile</a></li> 
       
     

    <li>   <a href="{{ route('logout') }}"
           class="  my-links-nav"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest


</ul>
</nav>

