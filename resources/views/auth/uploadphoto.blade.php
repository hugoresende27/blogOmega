@extends('layouts.app')

@section('content')
<div class="form-reg">

 <form action="/uploadphoto_save"  method="POST" enctype="multipart/form-data">
   
    @csrf
    <div class="m-3">
        <input type="file" name="image" class="form-control" onchange="preview()" >
        <img id="frame" src="" width="400px" height="400px" class="m-3"/>
    </div>
    <div class="my-reg">
        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('First Name') }}:
        </label>

        <input id="first_name" type="text" class="form-input w-full @error('first_name')  border-red-500 @enderror"
            name="first_name" value="{{ Auth::user()->first_name }}" required autocomplete="first_name" autofocus>
       
        @error('first_name')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="my-reg">
        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Last Name') }}:
        </label>

        <input id="last_name" type="text" class="form-input w-full @error('last_name')  border-red-500 @enderror"
            name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="last_name" autofocus>

        @error('last_name')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

  

    <div class="my-reg">
        <label for="nickname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Nickname') }}:
        </label>

        <input id="nickname" type="text" class="form-input w-full @error('nickname')  border-red-500 @enderror"
            name="nickname" value="{{ Auth::user()->nickname }}"  autocomplete="nickname" autofocus>

        @error('nickname')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Phone') }}:
        </label>

        <input id="phone" type="tel" class="form-input w-full @error('phone')  border-red-500 @enderror"
            name="phone" value="{{ Auth::user()->mobile }}" pattern="[0-9]{9}" autocomplete="phone" autofocus>

        @error('nickname')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="sex" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Sex') }}:
        </label>

        <select id="sex" type="text" class="form-input w-full @error('sex')  border-red-500 @enderror"
            name="sex" value="{{ Auth::user()->sex }}" required autocomplete="sex" autofocus>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
        @error('sex')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="born" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Date of Birth') }}:
        </label>

        <input id="born" type="date" class="form-input w-full @error('born')  border-red-500 @enderror"
            name="born" value="{{ Auth::user()->born }}" required autocomplete="born" autofocus max="2005-12-31" required>
            
        @error('sex')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>

    
    <button type="submit">Upload</button>

</form>

</div>

@endsection
