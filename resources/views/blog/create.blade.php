@extends('layouts.app')

@section('content')

    <div class="m-auto text-center w-4/5">
        <div class="py-15 text-left">
            <h1 class="text-6xl">
                Criar Post
            </h1>
        </div>
    </div>
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


    {{-- FORM CREATE-------------------- --}}
    <div class="m-auto pt-20 w-4/5 text-blue-500">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- INPUT TITULO-------------------- --}}
            <input type="text" name="title" placeholder="Titulo..."
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            {{-- INPUT POST-------------------- --}}
            <textarea name="description" placeholder="Texto do post..." class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

            {{-- INPUT IMAGEM-------------------- --}}
            {{-- <div class="bg-gray-lighter pt-15">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Ficheiro
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div> --}}
         
            
            {{-- BOTÃO SUBMIT-------------------- --}}
            <button type="submit"
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Postar

            </button>
        
        </form>
    </div>

    

    
    
@endsection