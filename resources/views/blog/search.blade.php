@extends('layouts.app')

@section('content')

<div class="main-content-posts  form-reg">
<h1 class="my-links-nav ">{{ $count }} results </h1>
<ul class="search-res-div">
    
    @if($collection->isNotEmpty())

        @foreach ($collection as $item)
            @foreach ($item as $i)
                
            
            
                @if (isset( $i->first_name))
                <li> 
                    <img src="{{ $i->image }}" alt="" class="search-img">
        
                    <a href="/profile/{{ $i->id }}"> {{ $i->first_name }}
                @endif
                @if (isset( $i->last_name))
                    {{ $i->last_name }}</li> </a> 
                @endif
                @if (isset( $i->title))
                <li>
                    <img src="{{ $i->image }}" alt="" class="search-img-post">
                    
                    <a href="/blog/{{ $i->slug }}"> {{ $i->title }}</li></a>  
                @endif
            
            @endforeach
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