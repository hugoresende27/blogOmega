@extends('layouts.app')

@section('content')
<div class="main-content-posts  form-reg">
    <div class="">
        
            <h1 class="post-show-label">
                {{ $post->title }}
            </h1>
            <h1 class="post-show-label">
                {{ $post->description }}
            </h1>
        
    
 
    <div class="sm:grid grid-cols-2 gap-20 mx-auto py-15 border-b w-4/5 block">
        <img class="mt-10 img-post-show" src="{{ $post->image }}" width="300" alt="img_do_post">
    </div>

    {{-- SHOW -- BOTÃO CONTINUE A LER ------------------- --}}
    <div class="m-auto">
        <a href="/profile/{{ $post->user->id }}">
            <img src="{{ $post->user->image }}" alt="profile_img" class="profile-img-posts">
            <span class="">
                De <span class=""> {{ $post->user->first_name }} </span> 
        </a>

    , criado em {{ date('h:i:sa Y-m-d', strtotime($post->updated_at)) }}

        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id || isset(Auth::user()->level) && Auth::user()->level == 3)

        <div class="">
            
                <a href="/blog/{{ $post->slug }}/edit" class="btn-hero-bt">
                    Edit
                </a>
           
        {{------------- BOTÃO DELETE APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
            
                <form action="/blog/{{ $post->slug }}" method="POST" class="mt-5">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn-hero-bt"
                    onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>              
            
        </div>
        @endif

        <section>
                       

            <p class="label-tags">Comments</p>
            <table class="table table-dark table-responsive">
                @foreach ($comments as $c)
                <tr>
                    @if ($c->post_id == $post->id)
                    
                        <td>{{ $c->user->first_name }}</td>

                       <td> <img src="{{ $c->user->image }}" alt="user_photo" class="comment-img" > </td>
                

                        <td>{{ $c->comment }} </td>
                
                       
                        
                
                    @endif
                </tr>  
                @endforeach
            </table>
            <span class="m-3">
                <a href="comments/create/{{ $post->id }}" class="btn-hero-bt">
                    Add Comment
                </a>
            </span>
        </section>


            

     
 
    </div>

    
    </div>
</div> 
    
@endsection