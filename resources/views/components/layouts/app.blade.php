<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100 text-gray-800">
       <header class="bg-gradient-to-r from-white to-blue-50 shadow-md animate-fadeIn">
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" wire:navigate class="text-2xl font-bold text-blue-700 tracking-wide hover:opacity-80 transition">
            Cloud Learner
        </a>

        <!-- Navigation Links -->
        <nav class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="{{ url('/') }}" wire:navigate class="text-gray-800 hover:text-blue-600 transition-all duration-200">Home</a>
            <a href="{{ url('/') }}" wire:navigate class="text-gray-800 hover:text-blue-600 transition-all duration-200">Courses</a>
            {{-- <a href="#about" class="text-gray-800 hover:text-blue-600 transition-all duration-200">About</a>
            <a href="#contact" class="text-gray-800 hover:text-blue-600 transition-all duration-200">Contact</a> --}}
        </nav>

        <!-- User Section -->
        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            @if (session()->has('user_id'))
                <span class="text-sm font-medium text-gray-700">
                    {{ session('user_name') }}
                </span>

                @if (session('user_role') === 'instructor')
                    <a href=""
                       wire:navigate
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-blue-700 transition-all duration-200">
                        + Add Course
                    </a>
                @endif

                <form action="" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-red-600 transition-all duration-200">
                        Logout
                    </button>
                </form>
            @else
                {{-- <a href=""
                   wire:navigate
                   class="text-blue-600 font-semibold text-sm hover:underline transition duration-200">
                    Login
                </a>
                <a href=""
                   wire:navigate
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-blue-700 transition-all duration-200">
                    Register
                </a> --}}
            @endif
        </div>
    </div>
</header>
        <!-- Main Content -->
        <main class="p-6">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>

</html>
