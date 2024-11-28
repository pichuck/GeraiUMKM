<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #0dbde6, #2eaf88);
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        }
    </style>

    <title>{{ $umkm->nama_umkm }} - Detail UMKM</title>
</head>

<body class="bg-gray-100 ">
    @include('layouts.header')

    <!-- Hero Section -->
    <div class="hero-section py-24 text-white">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold" data-aos="fade-up">{{ $umkm->nama_umkm }}</h1>
            <p class="text-lg mt-4 opacity-80" data-aos="fade-up" data-aos-delay="100">Temukan keunikan dan kualitas dari UMKM pilihan</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex gap-8 mt-8">
        <!-- Left Section (UMKM Detail) -->
        <div class="w-full lg:w-2/3 mb-6 lg:mb-0" data-aos="fade-up">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:-translate-y-2">
                <img src="{{ $umkm->foto_sampul ? Storage::url('umkm/foto_sampul/' . $umkm->foto_sampul) : asset('assets/img/sampul.png') }}" class="w-full h-64 object-cover" alt="{{ $umkm->nama_umkm }}">
                <div class="p-8">
                    <h3 class="text-2xl font-semibold mb-4">Tentang {{ $umkm->nama_umkm }}</h3>
                    <p class="text-gray-700 mb-6">{{ $umkm->deskripsi }}</p>

                    <h5 class="text-xl font-semibold mb-3">Informasi Bisnis</h5>
                    <div class="space-y-2">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-tag text-teal-500 mr-2"></i>
                            <span><strong>Kategori:</strong> {{ $umkm->kategori }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-map-marker-alt text-teal-500 mr-2"></i>
                            <span><strong>Alamat:</strong> {{ $umkm->alamat }}, {{ $umkm->kota }}, {{ $umkm->provinsi }} {{ $umkm->kode_pos }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-briefcase text-teal-500 mr-2"></i>
                            <span><strong>Informasi Bisnis:</strong> {{ $umkm->informasi_bisnis }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- Personal Information Section -->
        <!-- Right Section (Profile Card) -->
        <div class="w-full lg:w-1/3" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-xl shadow-lg p-8 text-center transition-transform transform hover:-translate-y-2">
                <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}" class="w-36 h-36 rounded-full mx-auto mb-4 border-4 border-white shadow-lg" alt="{{ $umkm->nama_umkm }}">
                <h5 class="text-2xl font-semibold mb-2">{{ $umkm->nama_umkm }}</h5>
                <div class="text-gray-600">
                    <div class="flex items-center justify-center mb-1">
                        <i class="fas fa-map-pin text-teal-500 mr-2"></i>
                        <span>{{ $umkm->kota }}, {{ $umkm->provinsi }}</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <i class="fas fa-folder text-teal-500 mr-2"></i>
                        <span>{{ $umkm->kategori }}</span>
                    </div>
                </div>
                <a href="{{ url('/umkm') }}" class="mt-6 inline-block bg-teal-500 text-white py-2 px-6 rounded-full hover:bg-teal-600">Kembali ke Daftar UMKM</a>
            </div>
        </div>
    </div>
</div>

    </div>

    @include('layouts.footer')

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>
