@extends('layouts.app')

@section('content')
<div class="flex form-login">

    <div class="card card-profile" style="width: 18rem;">
        <img class="card-img-top " src="{{ asset('profile_pics/'.Auth::user()->image) }}" alt="No image">
        <a href="/uploadphoto" class="btn-hero-bt">  Edit Profile</a>
        <div class="card-body">
          <p class="card-text">{{ Auth::user()->details }} </p>
          <p> <span class="label-tags">    First Name  {{ Auth::user()->first_name }} </span></p>
          <p> <span class="label-tags">    Last Name  {{ Auth::user()->last_name }} </span></p>
          <p> <span class="label-tags">    Nickname  {{ Auth::user()->nickname }} </span></p>
          <p> <span class="label-tags">    Phone  {{ Auth::user()->mobile }} </span></p>
          <p> <span class="label-tags">    Email  {{ Auth::user()->email }} </span></p>
          <p> <span class="label-tags">    Sex  {{ Auth::user()->sex }} </span></p>
          <p> <span class="label-tags">    Date of Birth  {{ Auth::user()->born }} </span></p>
          <p> <span class="label-tags">    Location  {{ Auth::user()->city }} </span></p>
          <p> <span class="label-tags">    Country  {{ Auth::user()->country }} </span></p>
        </div>
      </div>





</div>

@endsection
