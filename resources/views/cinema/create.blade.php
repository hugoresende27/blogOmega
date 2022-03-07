@extends('layouts.app')

@section('content')

     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
   


    {{-- FORM CREATE-------------------- --}}
    <div class="form-login">

        <div class="m-auto text-center w-4/5">
            <div class="py-15 text-left">
                <h1 class="welcome-title">
                    Create Cinema Review
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

        
        <form action="/cinema" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- INPUT IMAGEM-------------------- --}}
            <div class="m-3">

                
                {{-- <input type="file" name="image[]" id="file" onchange="preview()" multiple /> --}}
                {{-- <input type="file" name="image" class="form-control" onchange="preview()" > --}}
                <img id="frame" src="{{ $request->mimage }}" width="400px" height="400px" class="m-3"/>
                <input type="text" name="image" value="{{ $request->mimage }}"  style="display:none">
            </div>


            {{-- INPUT TITULO-------------------- --}}
            <div class="my-reg text-center">
              

                <input id="title" type="text" class="form-input  @error('title')  border-red-500 @enderror text-center"
                            style="min-width: 400px;
                                    cursor:default;
                                    border:none;
                                    outline:none;
                                    background-color:darkgreen;
                                    color:#fff;
                                    border-radius:5px;
                                    font-size:1rem"
                    name="title"   autocomplete="title" autofocus value="{{ $request->mtitle }}" readonly>

                    <span class="my-links-nav">Date: {{ $request->mdate }}</span>
                    <span class="my-links-nav">Rate: {{ $request->mvote }}</span>


            </div>



            {{-- RATE SYSTEM ----------------------------------------------------------------------------- --}}
         
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/rates.css">
            <link rel="stylesheet" href="{{ url('css/rates.css') }}">
            <div class="stars rating-system">
                
                  <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                  <label class="star star-1" for="star-1"></label>
              
            </div>

            {{-- INPUT POST------------------------------------------------------------------------------------ --}}
            <textarea name="description" placeholder="Write your review" class="form-input w-full" rows="10" cols="50" required></textarea>

         

           
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <button type="submit"
                    class="btn-hero-bt">
                Review

            </button>
        
        </form>
    </div>

    

    
    
@endsection