@extends('layouts.app')

@section('content')

     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
   


    {{-- FORM CREATE-------------------- --}}
    <div class="form-login">

        <div class="m-auto text-center w-4/5">
            <div class="py-15 text-left">
                <h1 class="welcome-title">
                    Create Post
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

        
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- INPUT TITULO-------------------- --}}
            <div class="my-reg">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Title') }}:
                </label>

                <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                    name="title"   autocomplete="title" autofocus>

                @error('title')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
           

            {{-- INPUT POST-------------------- --}}
            <textarea name="description" placeholder="Text..." class="form-input w-full" rows="10" cols="50"></textarea>

            {{-- INPUT IMAGEM-------------------- --}}
            <div class="m-3">
                <input type="file" name="image" class="form-control" onchange="preview()" >
                <img id="frame" src="" width="400px" height="400px" class="m-3"/>
            </div>
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <button type="submit"
                    class="btn-hero-bt">
                Post

            </button>
        
        </form>
    </div>

    

    
    
@endsection