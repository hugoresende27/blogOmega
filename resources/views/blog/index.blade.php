@extends('layouts.app')

@section('content')

<div class="main-content-posts  form-reg">






    {{-- VERIFICAR SE AUTENTICADO ---------------- --}}
    @if (Auth::check())

    <div class="btn-share">
        <a href="/blog/create"
            
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
                    <a href="/blog/{{ $p->slug }}" class="">
                        <div class="post-img">
                            <img src="{{ $p->image }}" width="" alt="img_do_post">
                        </div>
                        
                        
                        <h2 class="my-links-nav text-center">
                            {{-- {{ $p->title }} --}}

                            @if (isset($p->movie_rate))

                            @while  ($p->movie_rate >0)
                            
                            <i class="fa fa-star" aria-hidden="true"></i>
                            
                            <?php ($p->movie_rate --)?>
                            @endwhile
                                
                        
                        @endif


                        </h2>
                     

                    </a>

               

                    <div class="my-links-nav2">
                       
                            <img src="{{ $p->user->image }}" alt="profile_img" class="profile-img-posts">
                           
                                <a href="/profile/{{ $p->user->id }}">{{ $p->user->first_name }}</a>
                                {{ date('h:i:sa Y-m-d', strtotime($p->updated_at)) }}
                              
                    
                        <p class="post-desc">
                        
                            {{ $p->description }}
                        </p>
                        
                        
                            {{-- Read more --}}
                       
                    </div>
                    
                    <section>
                       

                        <span class="label-tags">Comments</span>
                        <a href="comments/create/{{ $p->id }}" class="btn-add-comment">
                            Add Comment
                        </a>

                        <div class="table-responsive">
                            <table class="table table-dark comments-table">

                                @foreach ($comments as $c)
                                <tr>
                                    @if ($c->post_id == $p->id)
                                        <td class="comments-table-name"> 
                                            <a href="/profile/{{ $p->user->id }}">
                                            <img src="{{ $c->user->image }}" alt="user_photo" class="comment-img" >
                                            
                                                {{ $c->user->first_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="comment-span">{{ $c->comment }}</span>
                                        </td>
                                
                                    @endif
                                </tr> 
                                @endforeach

                            </table>

                        </div>
                       
                           
                       
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
                                <span class="m-3">
                                    <a href="/blog/{{ $p->slug }}" class="btn-hero-bt">
                                        Read More
                                    </a>
                                </span>

                               


                                <button type="submit" class="btn-hero-bt"
                                onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>              
                        </span>
                    </div>
               
                    
                    @endif
                    
                </div> 

        
        </div>
        
    @endforeach
    
    <div class="text-center next-previous">
        
        {{ $posts->links() }}
    
    </div>

  </div>  
    
@endsection