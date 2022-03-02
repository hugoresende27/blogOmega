@extends('layouts.app')

@section('content')

<div class="main-content-posts  form-reg">

    <div class="m-auto text-center w-4/5">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                <?php
                $d=mktime(11, 14, 54, 8, 12, 2014);
                echo "<h1 class='welcome-title'>" . date("h:i:sa  ", $d)."<h1>";
                ?>
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
            class="btn-hero-bt"    
        >
            Share something
        </a>
    </div>
        
    @endif

      {{-- FOR EACH DOS POSTS ---------------- --}}
    @foreach ($posts as $p)

        {{-- {{ dd($p->image_path) }} --}}
        <div class="all-posts">
            <div>
                <img class="mt-10 rounded-2xl" src="{{ url('/post_pics/'.$p->image) }}" width="700" alt="img_do_post">
            </div>
            <div>
                <h2 class="text-green-300 font-bold text-5xl pb-4">
                    {{ $p->title }}
                </h2>
                <span class="">
                    De <span class=""> {{ $p->user->first_name }} </span>, criado em {{ date('h:i:sa Y-m-d', strtotime($p->updated_at)) }}
                </span>
              
                <p class=" ">
                
                    {{ $p->description }}
                </p>
                
                <a href="/blog/{{ $p->slug }}" class="btn-hero-bt2">
                    Read more
                </a>

                 {{------------- BOTÃO EDIT APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                @if (isset(Auth::user()->id) && Auth::user()->id == $p->user_id)

                <div class="but-ger">
                    <span class="">
                        <a href="/blog/{{ $p->slug }}/edit" class="btn-hero-bt2">
                            Edit
                        </a>
                    </span>
                {{------------- BOTÃO DELETE APENAS VISIVEL SE AUTENTICADO E AUTENTICADO CORRESPONDER AO AUTOR DO POST --}}
                    <span class="">
                        <form action="/blog/{{ $p->slug }}" method="POST" class="mt-5">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-hero-bt">
                                Delete
                            </button>
                        </form>              
                    </span>
                </div>

                    
                @endif
                 

            </div>
        </div>
        
    @endforeach

  </div>  
    
@endsection