@extends('layouts.app')

@section('content')
<div class="main-content-posts  form-reg">
    <div class="post-show">
        
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

        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id || isset(Auth::user()->level) && Auth::user()->level == 3)

        <div class="but-ger">
            <span class="">
                <a href="/blog/{{ $post->slug }}/edit" class="btn-hero-bt2">
                    Edit
                </a>
            </span>
        {{------------- BOTÃO DELETE APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
            <span class="">
                <form action="/blog/{{ $post->slug }}" method="POST" class="mt-5">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn-hero-bt"
                    onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>              
            </span>
        </div>
        @endif
        <span class="">
            De <span class="">
                {{ $post->user->name }}, criado em {{ date('h:i:sa Y-m-d', strtotime($post->updated_at)) }}
            </span>
        </span>

        <p class="">
            {{ $post->description }}
        </p>
 
    </div>

    
    </div>
</div> 
    
@endsection