@extends('layouts.app')

@section('content')
    
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-blue-100 text-5xl uppercase font-bold text-shadow-md pb-14">
                    torne-se um desenvolvedor de Laravel 
                </h1>
                <a href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase"
                >Saiba mais</a>
            </div>
        </div>
    </div>


    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200 bg-gray-300">
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

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Programadores de ...
        </h2>
        <span class="font-extrabold block text-4xl py-1">
            PHP
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Scrum
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Laravel
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Java
        </span>

    </div>

    <div class="text-center pt-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>
        <h2 class="text-4xl font-bold py-10">
            Posts Recentes
        </h2>
        <p class="m-auto text-gray-500 w-4/5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam autem accusamus harum ab dolorem vel iusto voluptate tempora, itaque sapiente laborum, modi doloremque id at praesentium nulla voluptatibus suscipit architecto!
        </p>
    </div>

    <div class="sm:grid grid-cols-2 m-auto w-4/5 ">
        <div class="flex bg-yellow-700 text-gray-100 pt-10 mt-10 rounded-2xl">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span>
                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem perspiciatis, recusandae saepe dolorem culpa facere veniam, possimus fugit atque commodi assumenda inventore omnis odit totam distinctio neque aliquam minima necessitatibus?
                </h3>
                <a href=""
                    class="uppercase bg-transparent border-2 border-black text-black text-xs font-extrabold py-3 px-5 rounded-3xl"    
                >Saber mais</a>
            </div>
        </div>
        <div >
            <img class="mt-10 rounded-2xl" src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" width="700" alt="notebook_img">
        </div>
    </div>

@endsection