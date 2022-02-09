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

        {{-- {{ dd($p->image_path) }} --}}
        <div class="sm:grid grid-cols-2 gap-20 mx-auto py-15 border-b w-4/5 block">
            <div>
                <img class="mt-10 rounded-2xl" src="{{ URL('/images/'.$p->image_path) }}" width="700" alt="img_do_post">
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $p->title }}
                </h2>
                <span class="text-gray-500">
                    De <span class="font-bold italic text-gray-800"> {{ $p->user->name }} </span>, criado em {{ date('h:i:sa Y-m-d', strtotime($p->updated_at)) }}
                </span>
              
                <p class=" text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                
                    {{ $p->description }}
                </p>
                
                <a href="/blog/{{ $p->slug }}" class="hover:text-black uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Continue a ler
                </a>

                 {{------------- BOTÃO EDIT APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                @if (isset(Auth::user()->id) && Auth::user()->id == $p->user_id)

                <div class="relative">
                    <span class="float-right">
                        <a href="/blog/{{ $p->slug }}/edit" class="py-4 px-4 bg-green-500 rounded-3xl text-lg hover:text-white">
                            Editar
                        </a>
                    </span>
                {{------------- BOTÃO DELETE APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                    <span class="float-right">
                        <form action="/blog/{{ $p->slug }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="mb-4 py-4 px-4 bg-red-500 rounded-3xl text-lg hover:text-white">
                                Delete
                            </button>
                        </form>              
                    </span>
                </div>

                    
                @endif
                 

            </div>
        </div>
        
    @endforeach

    
    
@endsection