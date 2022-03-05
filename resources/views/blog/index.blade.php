@extends('layouts.app')

@section('content')

<div class="main-content-posts  form-reg">

    <div class="m-auto text-center w-4/5">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                <?php
                $d=mktime(11, 14, 54, 8, 12, 2014);
                echo "<h1 class='welcome-title'>" . date("h:i:sa  ", $d)."<h1>";
                ?>
            </h1>
        </div>
    </div>





    {{-- VERIFICAR SE AUTENTICADO ---------------- --}}
    @if (Auth::check())

    <div class="btn-share">
        <a href="/blog/create"
            class="btn-share"    
        >
            Share something
        </a>
    </div>
        

    <div class="text-center next-previous">
        
        {{ $posts->links() }}
    
    </div>
    @endif

      {{-- FOR EACH DOS POSTS ---------------- --}}
    @foreach ($posts as $p)
  

        {{-- {{ dd($p->image_path) }} --}}
        <div class="all-posts">

       
               
           
               
          
                <div class="post-text">
                    <div class="post-img">
                        <img src="{{ $p->image }}" width="" alt="img_do_post">
                    </div>
                  
                    
                    <h2 class="text-green-300 font-bold text-5xl pb-4">
                        {{ $p->title }}
                    </h2>
                        <a href="/profile/{{ $p->user->id }}">
                            <img src="{{ $p->user->image }}" alt="profile_img" class="profile-img-posts">
                            <span class="">
                                De <span class=""> {{ $p->user->first_name }} </span> 
                        </a>
                                
                                
                                
                                , criado em {{ date('h:i:sa Y-m-d', strtotime($p->updated_at)) }}
                            </span>
                
                    <p class=" ">
                    
                        {{ $p->description }}
                    </p>
                    
                    <a href="/blog/{{ $p->slug }}" class="btn-hero-bt2">
                        Read more
                    </a>

                    <section>
                       

                        <p class="label-tags">Comments</p>
                        <table class="table table-dark table-responsive">

                            @foreach ($comments as $c)
                            <tr>
                                @if ($c->post_id == $p->id)
                                    <td> 
                                        <a href="/profile/{{ $p->user->id }}">
                                            {{ $c->user->first_name }}
                                        
                                    </td>
                                    <td>
                                        <img src="{{ $c->user->image }}" alt="user_photo" class="comment-img" >
                                        </a>
                                    </td>
                                    <td>
                                        <span class="comment-span">{{ $c->comment }}</span>
                                    </td>
                            
                                @endif
                            </tr> 
                            @endforeach

                        </table>
                        <span class="m-3">
                            <a href="comments/create/{{ $p->id }}" class="btn-hero-bt">
                                Add Comment
                            </a>
                        </span>
                    </section>

                    {{------------- BOTÃO EDIT APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                    @if (isset(Auth::user()->id) && Auth::user()->id == $p->user_id || isset(Auth::user()->level) && Auth::user()->level == 3)

                    <div class="">
                     
                    {{------------- BOTÃO DELETE APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                        <span class="">
                            <form action="/blog/{{ $p->slug }}" method="POST" class="mt-5">
                                @csrf
                                @method('delete')

                                <span class="m-3">
                                    <a href="/blog/{{ $p->slug }}/edit" class="btn-hero-bt">
                                        Edit
                                    </a>
                                </span>

                               


                                <button type="submit" class="btn-hero-bt"
                                onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>              
                        </span>
                    </div>
                </div>
                    
                @endif
                 

        
        </div>
        
    @endforeach
    
    <div class="text-center next-previous">
        
        {{ $posts->links() }}
    
    </div>

  </div>  
    
@endsection