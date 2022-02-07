@extends('layouts.app')

@section('content')
    
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    torne-se um desenvolvedor de Laravel 
                </h1>
                <a href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase"
                >Saiba mais</a>
            </div>
        </div>
    </div>


    <div class="sm:grid grid-cols-2 gap-20 w-25 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" width="700" alt="notebook_img">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Quer tornar-se um melhor desenvolvedor de web?
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Duci
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Duci
            </p>
            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Duci
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Duci
            </p>
            <a href="/blog"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl"   
            >Descubra mais</a>
        </div>
    </div>

@endsection