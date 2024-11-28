<!doctype html>
<html lang="en">

<head>
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>

<body class="bg-white h-screen flex flex-col md:flex-row">

    <!-- Left Side (White Background with Login Form) -->
    <div class="w-full md:w-1/2 h-full bg-white flex items-center justify-center">
        <div class="w-full max-w-md p-8 bg-white rounded-lg">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logoText.png') }}" alt="POS UMKM Logo" style="height: 45px;"></a>
            </div>

             <!-- Flash Message for Success -->
             @if (session('success'))
             <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                 role="alert">
                 <strong class="font-bold">Success!</strong>
                 <span class="block sm:inline">{{ session('success') }}</span>
             </div>
         @endif

         <!-- Flash Message for Error -->
         @if (session('error'))
             <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
                 role="alert">
                 <strong class="font-bold">Error!</strong>
                 <span class="block sm:inline">{{ session('error') }}</span>
             </div>
         @endif

            <!-- Login Form -->
            <form action="{{ route('postlogin') }}" method="POST" class="space-y-8">
                @csrf
                <div class="relative w-full">
                    <label for="email" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Email</label>
                    <input type="email" name="email" id="email" placeholder="name@company.com"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-400 focus:outline-none focus:ring-2"
                        required>
                </div>

                <div class="relative w-full">
                    <label for="password" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="***********"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2"
                        required>
                </div>

                <button type="submit"
                    class="w-full p-3 bg-teal-400 text-white font-semibold rounded-lg hover:bg-teal-500 transition">Masuk</button>
            </form>

            <!-- Links and Buttons -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Belum Punya Akun?</p>
            </div>

            <div class="flex justify-center space-x-4 mt-4">
                <a href="{{ route('register') }}"
                    class="w-1/2 p-2 bg-teal-500 text-white font-semibold rounded-lg hover:bg-teal-600 transition text-center flex items-center justify-center">
                    Daftar Sebagai Mahasiswa
                </a>
                <a href="{{ route('registerumkm') }}"
                    class="w-1/2 p-2 bg-teal-400 text-white font-semibold rounded-lg hover:bg-teal-500 transition text-center flex items-center justify-center">
                    Daftar Sebagai UMKM
                </a>
            </div>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Lupa Password? <a href="#"
                        class="text-blue-500 font-semibold hover:underline">Klik disini</a></p>
            </div>
        </div>
    </div>

    <!-- Right Side (Gradient Background with Centered Logo) - Hidden on Small Screens -->
    <div class="hidden md:flex w-full md:w-1/2 h-full bg-gradient-to-r from-custom-start to-custom-end items-center justify-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-1/3">
    </div>

</body>

</html>
