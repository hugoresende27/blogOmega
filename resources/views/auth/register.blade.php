@extends('layouts.app')

@section('content')

<div class="form-reg">
        

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- <div class="my-reg">
                        <input type="file" name="image" class="form-control" onchange="preview()">
                        <img id="frame" src="" width="300px" height="300px" class="m-3"/>
                    </div> --}}
                    
                    <div class="my-reg">
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('First Name') }}:
                        </label>

                        <input id="first_name" type="text" class="form-input w-full @error('first_name')  border-red-500 @enderror"
                            name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                       
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
                            name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                            name="nickname" value="{{ old('nickname') }}"  autocomplete="nickname" autofocus>

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
                            name="phone" value="{{ old('phone') }}" pattern="[0-9]{9}" autocomplete="phone" autofocus>

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
                            name="sex" value="{{ old('sex') }}" required autocomplete="sex" autofocus>
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
                            name="born" value="{{ old('born') }}" required autocomplete="born" autofocus max="2005-12-31" required>
                            
                        @error('sex')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="my-reg">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="my-reg">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="my-reg">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="my-reg">
                        <button type="submit"
                            class="btn-hero-bt">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('Already have an account?') }}
                            <a class="" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

           
        </div>

@endsection
