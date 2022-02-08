@extends('layouts.app')

@section('content')

    <div class="m-auto text-center w-4/5">
        <div class="py-15 text-left">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>
 


    {{-- SHOW -- BOTÃO CONTINUE A LER ------------------- --}}
    <div class="m-auto pt-20 w-4/5 text-blue-500 ">
        <span class="text-gray-500">
            De <span class="font-bold italic text-gray-800">
                {{ $post->user->name }}, criado em {{ date('h:i:sa Y-m-d', strtotime($post->updated_at)) }}
            </span>
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light ">
            {{ $post->description }}
        </p>
 
    </div>

    

    
    
@endsection