@extends('app')

@section('title',"Register | ". env('APP_NAME'))

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="mb-4">
                <label for="name">Name </label>
                <input type="text" name="name" placeholder="Your name" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                @error('name') border-red-500 @enderror" value="{{old('name')}}">
                
                @error('name')
                   <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="username">Username </label>
                <input type="text" name="username" placeholder="Your username" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('username') border-red-500 @enderror" value="{{old('username')}}">

                @error('username')
                   <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="email">Email </label>
                <input type="email" name="email" placeholder="Your email adress" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('email') border-red-500 @enderror" value="{{old('email')}}">

                @error('email')
                   <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="password">Password </label>
                <input type="password" name="password" placeholder="Your password" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('password') border-red-500 @enderror">

                @error('password')
                   <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Confirme Password </label>
                <input type="password" name="password_confirmation" placeholder="Your password again" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </div>
            
        </form>
    </div>
</div>
@endsection

