@extends('layouts.app')

@section('content')
<div class=" form-reg">
  {{-- {!!  asset('storage/file.txt'); !!} --}}

 

 @foreach ($user as $item)
     
  @if ($item->id == Auth::user()->id)
      <a href="/uploadphoto" class="btn-share">  Edit My Profile</a>
  @endif
        

  

            <div class="card-body">

        

              <img class="card-img-top " src="{{ $item->image }}" alt="No image">
              @if (isset($item->details))
              <p ><span class="label-tags"> {{ $item->details }} </p>
              @endif

              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <span class="label-tags2">
                      First Name   
                    </span>
                    <p class="label-tags">
                       {{ $item->first_name }}
                    </p> 
                    <span class="label-tags2">
                      Last Name   
                    </span>
                    <p class="label-tags">
                       {{ $item->last_name }}
                    </p> 
                    <span class="label-tags2">
                      Nickname   
                    </span>
                    <p class="label-tags">
                      {{ $item->nickname }}
                    </p> 
                  </div>
                  <div class="col-sm">
                    <span class="label-tags2">
                      Phone 
                    </span> 
                    <p class="label-tags">
                      {{ $item->mobile }}
                    </p> 
                    <span class="label-tags2">
                      Email  
                    </span>
                    <p class="label-tags">
                      {{ $item->email }}
                    </p> 
                    <span class="label-tags2">
                      Sex 
                    </span>  
                    <p class="label-tags">
                      {{ $item->sex }} 
                    </p> 
                  </div>
                  <div class="col-sm">
                    <span class="label-tags2">
                      Age  
                    </span>
                    <p class="label-tags">
                      {{ $age }} years 
                    </p> 
                    <span class="label-tags2">
                      Date of Birth  
                    </span>  
                    <p class="label-tags">
                      {{ $item->born }}
                    </p> 
                    <span class="label-tags2">
                      Location   
                    </span>
                    <p class="label-tags">
                      {{ $item->country }}
                    </p> 
                  </div>
                </div>
              </div>
              


@endforeach  

      




</div>

@endsection
