@extends('layouts.app')

@section('content')

<div class="main-content-posts  form-reg">
<h1 class="my-links-nav ">{{ $count }} results </h1>
<ul class="search-res-div">
    
    @if(!empty($results1))
        @foreach ($results1 as $item)           
        
            <li> 
                <img src="{{ $item->image }}" alt="" class="search-img">
                <a href="/profile/{{ $item->id }}"> {{ $item->first_name }}
        
                    
                        {{ $item->last_name }}</li> </a> 
        @endforeach
    @endif

    @if (!empty($results3))
        @foreach ($results3 as $item)   
                <li>
                    <img src="{{ $item->image }}" alt="" class="search-img-post">
                    
                    <a href="/blog/{{ $item->slug }}"> {{ $item->title }}</li></a>  
    
        @endforeach  

    @else 
    <li>
        Sem resultados
    </li>
    @endif
    {{-- {{ dd($collection) }} --}}
    </div>
</ul>
    
@endsection