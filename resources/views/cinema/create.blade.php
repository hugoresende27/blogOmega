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
                                    border-radius:5px"
                    name="title"   autocomplete="title" autofocus value="{{ $request->mtitle }}" readonly>

                    <span class="my-links-nav">Date: {{ $request->mdate }}</span>
                    <span class="my-links-nav">Rate: {{ $request->mvote }}</span>


            </div>
           

            {{-- INPUT POST-------------------- --}}
            <textarea name="description" placeholder="Write your review" class="form-input w-full" rows="10" cols="50"></textarea>

         

           
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <button type="submit"
                    class="btn-hero-bt">
                Review

            </button>
        
        </form>
    </div>

    

    
    
@endsection