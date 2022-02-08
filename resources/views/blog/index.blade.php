@extends('layouts.app')

@section('content')

    <div class="m-auto text-center w-4/5">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 mx-auto py-15 border-b w-4/5">
        <div>
            <img class="mt-10 rounded-2xl" src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" width="700" alt="notebook_img">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                Aprenda sobre a framework Laravel
            </h2>
            <span class="text-gray-500">
                De <span class="font-bold italic text-gray-800"> Hugo Resende </span>, postado à 1 dia
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem odit quia doloremque quo recusandae earum, repudiandae explicabo molestiae velit, ipsum ea nesciunt voluptatibus? Facilis accusamus dolor, et dolorum quos vitae.
            </p>

            <a href="" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Continue a ler
            </a>
        </div>
    </div>
    
@endsection