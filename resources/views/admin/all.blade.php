@extends('layouts.app')

@section('content')




    <div class="m-auto text-center w-4/5">
        <div class="py-15 text-left">
            <h1 class="text-6xl">
                Todos os Users Registados
            </h1>
        </div>
    </div>
     {{-- DEBUG DE ERROS NO FORM-------------------- --}}
     @if ($errors->any())
        <div class="m-auto w-4/5">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li class="mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-4 w-1/5">
                        {{ $erro }}                   
                    </li>                 
                @endforeach
            </ul>
        </div>       
     @endif

     
     <div class="sm:grid grid-cols-3 w-25 w-4/5 pb-10 m-auto border-b-2 border-gray-700">
        <table class="border-collapse border border-slate-500">
            <thead>
            <tr>
                <th>Name</th>
                <th>Password</th>
            
            </tr>
            </thead>
            <tbody>

            @foreach ($all_users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            
            </tr>
            @endforeach
            
            </tbody>
        </table>
     </div>

  
    

    
    
@endsection