@extends('layouts.app')

@section('content')

    <div class="m-auto text-center w-4/5">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>
    {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
    @if (session()->has('message'))
        <div class="m-auto mt-10 pl-2 w-4/5">
            <p class="mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 px-4 w-2/6">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif



    {{-- VERIFICAR SE AUTENTICADO ---------------- --}}
    @if (Auth::check())

    <div class="pt-15 w-4/5 m-auto">
        <a href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-s font-extrabold py-3 rounded-3xl px-5"    
        >
            Criar um post
        </a>
    </div>
        
    @endif

      {{-- FOR EACH DOS POSTS ---------------- --}}
    @foreach ($posts as $p)


        <div class="sm:grid grid-cols-2 gap-20 mx-auto py-15 border-b w-4/5">
            <div>
                <img class="mt-10 rounded-2xl" src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" width="700" alt="notebook_img">
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $p->title }}
                </h2>
                <span class="text-gray-500">
                    De <span class="font-bold italic text-gray-800"> {{ $p->user->name }} </span>, criado em {{ date('h:i:sa Y-m-d', strtotime($p->updated_at)) }}
                </span>

                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $p->description }}
                </p>

                <a href="/blog/{{ $p->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Continue a ler
                </a>
            </div>
        </div>
        
    @endforeach

    
    
@endsection