@extends('layouts.app')

@section('content')
<div class=" form-login">
  {{-- {!!  asset('storage/file.txt'); !!} --}}

 

 @foreach ($user as $item)
     
  @if ($item->id == Auth::user()->id)
      <a href="/uploadphoto" class=" edit-btn">  Edit My Profile</a>
  @endif
        

        <div class="left-side-card-profile">
          
          <img class="card-img-top " src="{{ $item->image }}" alt="No image">
        

        </div>
        <div class="right-side-card-profile">

            <div class="card-body">
              
              @if (isset($item->details))
                <p ><span class="label-tags"> {{ $item->details }} </p>
              @endif
            
              <p> <span class="label-tags">    First Name  {{ $item->first_name }} </span></p>
              <p> <span class="label-tags">    Last Name  {{ $item->last_name }} </span></p>
              <p> <span class="label-tags">    Nickname  {{ $item->nickname }} </span></p>
              <p> <span class="label-tags">    Phone  {{ $item->mobile }} </span></p>
              <p> <span class="label-tags">    Email  {{ $item->email }} </span></p>
              <p> <span class="label-tags">    Sex  {{ $item->sex }} </span></p>
              <p> <span class="label-tags">    Age {{ $age }} years </span></p>  
              <p> <span class="label-tags">    Date of Birth  {{ $item->born }} </span></p>
            
              <p> <span class="label-tags">    Location  {{ $item->country }} </span></p>
            </div>

        </div>

@endforeach  

      




</div>

@endsection
