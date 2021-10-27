

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body class="bg-gray-200">
    <nav class="bg-white flex justify-between mb-6 p-6">
        <ul class="flex items-center ">
            <li>
                <a href="{{route('home')}}" class="p-3">
                    Home
                </a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="p-3">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="p-3">
                    Post
                </a>
            </li>
        </ul>

        <ul class="flex items-center ">
            {{-- Start Unauthentified links menu --}}
            @guest
            <li>
                <a href="{{route('login')}}" class="p-3">
                    Login 
                </a>
            </li>
            <li>
                <a href="{{route('register')}}" class="p-3">
                    Register
                </a>
            </li>     
            @endguest
            {{-- End Unauthentified links menu --}}


            {{-- Start Authenticate links menu --}}
            @auth
            <li>
                <a href="/" class="p-3">
                    {{auth()->user()->name}} 
                </a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>  
            @endauth
            {{-- End Authenticate links menu --}}

        </ul>
    </nav>
    {{-- Start the Content Section --}}

        @yield('content')

    {{-- End the Content Section --}}

    <footer class="py-12 px-4">
        <div class="mx-auto container text-center">
            <a href="about" class="text-base">About</a>
            <p class="mt-3 text-sm text-md text-gray-900">Made with ❤️ by &copy;BootCamp Solidarity &middot; 2021</p>
        </div>
    </footer>
    
</body>

</html>