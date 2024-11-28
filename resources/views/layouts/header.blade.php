<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gerai UMKM</title>
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/customStyle.css') }}">
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
    
</head>

<body class="bg-white text-gray-800 font-poppins">

  <!-- Navbar -->
<header class="w-full fixed top-0 bg-white shadow z-10">
    <div class="container mx-auto py-4 flex items-center justify-between px-6">
        
        <!-- Logo Section -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/img/logoText.png') }}" alt="Gerai Logo" class="h-10 w-auto">
            </a>
        </div>

        <!-- Centered Menu for Desktop -->
        <div class="hidden md:flex flex-grow justify-center" id="navbarsFurni">
            <ul class="flex space-x-6 text-gray-400 text-sm">
                <li class="nav-item {{ request()->routeIs('index') ? 'text-teal-700' : '' }}">
                    <a class="nav-link hover:text-teal-700" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item {{ request()->routeIs('event','event.detail') ? 'text-teal-700' : '' }}">
                    <a class="nav-link hover:text-teal-700" href="{{ route('event') }}">Artikel</a>
                </li>
                <li class="nav-item {{ request()->routeIs('umkm.index.beranda','umkm.show') ? 'text-teal-700' : '' }}">
                    <a class="nav-link hover:text-teal-700" href="{{ route('umkm.index.beranda') }}">UMKM</a>
                </li>
                @if (Auth::check() && Auth::user()->role === 'mahasiswa')
                <li class="nav-item {{ request()->routeIs('mahasiswa.pekerjaan', 'mahasiswa.pekerjaan.show', 'mahasiswa.pekerjaan.category') ? 'text-teal-700' : '' }}">
                    <a class="nav-link hover:text-teal-700" href="{{ route('mahasiswa.pekerjaan') }}">Project</a>
                </li>
                    <li class="nav-item {{ request()->routeIs('mahasiswa.chat') ? 'text-teal-700' : '' }}">
                        <a class="nav-link hover:text-teal-700" href="{{ route('mahasiswa.chat') }}">Chat</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('mahasiswa.profile','mahasiswa.profile.edit') ? 'text-teal-700' : '' }}">
                        <a class="nav-link hover:text-teal-700" href="{{ route('mahasiswa.profile') }}">Profile</a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Right Section for Desktop -->
        <div class="hidden md:flex items-center space-x-4">
            @if (Auth::check())
                <!-- When user is logged in -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-teal-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
                </form>
            @else
                <!-- When user is not logged in -->
                <a href="{{ route('login') }}" class="text-teal-700 font-semibold">Daftar</a>
                <a href="{{ route('login') }}" class="bg-teal-700 text-white px-4 py-2 rounded-full font-semibold">Masuk</a>
            @endif
        </div>

        <!-- Mobile Hamburger Icon -->
        <button id="hamburger" class="md:hidden flex flex-col space-y-1">
            <span class="w-8 h-1 bg-black"></span>
            <span class="w-8 h-1 bg-black"></span>
            <span class="w-8 h-1 bg-black"></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="fixed inset-y-0 right-0 w-64 bg-white p-6 hidden z-20 md:hidden">
        <button id="closeMenu" class="text-gray-600 text-2xl">&times;</button>
        <nav class="mt-6 space-y-4 text-gray-600 font-semibold text-sm">
            <a href="{{ route('index') }}" class="block hover:text-teal-700 {{ request()->routeIs('index') ? 'text-teal-700' : '' }}">Beranda</a>
            <a href="{{ route('event') }}" class="block hover:text-teal-700 {{ request()->routeIs('event') ? 'text-teal-700' : '' }}">Artikel</a>
            <a href="{{ route('umkm.index.beranda') }}" class="block hover:text-teal-700 {{ request()->routeIs('umkm.index.beranda') ? 'text-teal-700' : '' }}">UMKM</a>
            @if (Auth::check() && Auth::user()->role === 'mahasiswa')
                <a href="{{ route('mahasiswa.pekerjaan') }}" class="block hover:text-teal-700 {{ request()->routeIs('mahasiswa.pekerjaan') ? 'text-teal-700' : '' }}">Project</a>
                <a href="{{ route('mahasiswa.chat') }}" class="block hover:text-teal-700 {{ request()->routeIs('mahasiswa.chat') ? 'text-teal-700' : '' }}">Chat</a>
                <a href="{{ route('mahasiswa.profile') }}" class="block hover:text-teal-700 {{ request()->routeIs('mahasiswa.profile') ? 'text-teal-700' : '' }}">Profile</a>
            @endif
            <div class="mt-6">
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-teal-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="w-full bg-teal-700 text-white px-4 py-2 rounded-full font-semibold mt-4 inline-block text-center">Daftar</a>
                    <a href="{{ route('login') }}" class="w-full bg-teal-700 text-white px-4 py-2 rounded-full font-semibold mt-4 inline-block text-center">Masuk</a>
                @endif
            </div>
        </nav>
    </div>
</header>

    @yield('content')

    <script src="{{ asset('assets/js/app.js')}}"></script>


</body>


</html>
