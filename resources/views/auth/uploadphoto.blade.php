@extends('layouts.app')

@section('content')
<div class="form-reg">
      {{-- SE HOUVER MENSAGEM MOSTRA AQUI ---------------- --}}
      @if (isset($message))
      <div id='hideMe'  >
          <p class="message-box-2">
            &#128712;   {{ $message }}
          </p>
      </div>
      @endif

 <form action="/uploadphoto_save"  method="POST" enctype="multipart/form-data" class="form-box">
   {{-- {{ dd(get_defined_vars()) }} --}}
    @csrf
    <div class="m-3">
        <img src="{{ Auth::user()->image }}" alt="old_image">
        <input type="file" name="image" class="form-control" onchange="preview()" >

        <img id="frame" src="" class="image-input" class="m-3"/>
    </div>
    <div class="my-reg">
        <label for="first_name" class="label-tags">
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
        <label for="last_name" class="label-tags">
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
        <label for="nickname" class="label-tags">
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
        <label for="details" class="label-tags">
            {{ __('About me') }}:
        </label><br>

        <textarea id="details" type="text" class="form-input w-full @error('details')  border-red-500 @enderror"
            name="details"cols="35" rows="3">{{ Auth::user()->details }}</textarea>

        @error('details')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="phone" class="label-tags">
            {{ __('Phone') }}:
        </label>

        <input id="phone" type="tel" class="form-input w-full @error('phone')  border-red-500 @enderror"
            name="phone" value="{{ Auth::user()->mobile }}" pattern="[0-9]{9}" autocomplete="phone" autofocus>

        @error('phone')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="sex" class="label-tags">
            {{ __('Sex') }}:
        </label>

        <select id="sex" type="text" class="form-input w-full @error('sex')  border-red-500 @enderror"
            name="sex" value="{{ Auth::user()->sex }}" required autocomplete="sex" autofocus>
            <option value="M">Masculine</option>
            <option value="F">Feminine</option>
            <option value="O">Other</option>
        </select>
        @error('sex')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="born" class="label-tags">
            {{ __('Date of Birth') }}:
        </label>

        <input id="born" type="date" class="form-input w-full @error('born')  border-red-500 @enderror"
            name="born" value="{{ Auth::user()->born }}"  autocomplete="born" autofocus max="2005-12-31" >
            
        @error('born')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="my-reg">
        <label for="country" class="label-tags">
            {{ __('Country') }}:
        </label>

        <select id="country" type="text" class="form-input w-full @error('country')  border-red-500 @enderror"
            name="country" value="{{ Auth::user()->country }}" required autocomplete="country" autofocus>
            @foreach ($countries as $c)
                <option value="{{ $c->name }}">{{ $c->name }}</option>
            @endforeach
        </select>
        @error('country')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>


    
    <button type="submit">Upload</button>

</form>

</div>

@endsection
