@extends('layouts.app')

@section('content')

     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
   


    {{-- FORM CREATE-------------------- --}}
    <div class="form-login">

        <div class="m-auto text-center w-4/5">
            <div class="py-15 text-left">
                <h1 class="welcome-title">
                    Edit Comment
                </h1>
            </div>
        </div>
        @if ($errors->any())
        <div id="hideMe">
            <ul>
                @foreach ($errors->all() as $erro)
                    <p class="message-box-2">
                        &#9888;   {{ $erro }}                  
                    </p>                 
                @endforeach
            </ul>
        </div>       
     @endif

        <div class="all-posts">    
             <h1 class="welcome-title">{{ $comment->post->title }}</h1>
            <img src="{{ $comment->post->image }}" alt="">
        </div>

        <form action="/comments/{{ $comment->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="post_id" id="post_id" value="{{ $comment->post->id }}" />
  
            {{-- INPUT POST-------------------- --}}
            <textarea name="comment" placeholder="Text..." class="form-input w-full" rows="10" cols="50" required >{{ $comment->comment }}</textarea>

            {{-- INPUT IMAGEM-------------------- --}}
            {{-- <div class="m-3">
                <input type="file" name="image" class="form-control" onchange="preview()" >
                <img id="frame" src="" width="400px" height="400px" class="m-3"/>
            </div> --}}
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <button type="submit"
                    class="btn-hero-bt m-3">
                Edit comment

            </button>
        
        </form>
    </div>

    

    
    
@endsection