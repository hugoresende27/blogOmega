@extends('layouts.app')

@section('content')

    <div class="form-login">
        
           

          

                <form class="" method="POST" action="{{ route('login') }}" class="form-login-inside">
                    @csrf

                    <h1 class="welcome-title">Login</h1>

                    <div class="flex flex-wrap">
                        

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                       

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required
                            placeholder="Password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="btn-hero-bt">
                            {{ __('Login') }}
                    </button>

                    <div class="flex items-center">
                        


                        <label class="" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Save user') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class=""
                            href="{{ route('password.request') }}">
                            {{ __('Forget your password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                     

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("No account?") }}
                            <a class="" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </p>
                        @endif
                       
                    </div>
                </form>

          
        
    </div>

@endsection
