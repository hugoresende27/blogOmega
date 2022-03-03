@extends('layouts.app')

@section('content')



  
     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
     @if ($errors->any())
        <div class="m-auto w-4/5">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li class="mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-4 w-1/5">
                        {{ $erro }}                   
                    </li>                 
                @endforeach
            </ul>
        </div>       
     @endif

       
    <div class="form-login">

        <div class="m-auto text-center w-4/5">
            <div class="py-15 text-left">
                <h1 class="welcome-title">
                    Edit Post
                </h1>
            </div>
        </div>


    {{-- FORM EDIT-------------------- --}}
    <div class="form-login">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

      

           {{-- INPUT TITULO-------------------- --}}
           <div class="my-reg">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4"
                    >
                {{ __('Title') }}:
            </label>

            <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                name="title"  required autocomplete="title" autofocus
                value ="{{ $post->title }}">

            @error('title')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
       

        {{-- INPUT POST-------------------- --}}
        <textarea name="description" placeholder="Text..." class="form-input w-full" rows="10" cols="50"
        
        >{{ $post->description }}</textarea>

        {{-- INPUT IMAGEM-------------------- --}}
        <div class="m-3">
            <img src="{{ $post->image }}" alt="old_image">
            <h1>Change Image</h1>
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