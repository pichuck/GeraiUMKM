@extends('layouts.header')
@section('content')


<!-- Hero Section -->
<section class="flex flex-col-reverse md:flex-row items-center justify-between max-w-7xl mx-auto px-8 py-20 md:py-24 space-y-8 md:space-y-0 min-h-screen mt-8">
  <div class="text-center md:text-left space-y-6 max-w-lg">
    <h1 class="text-5xl font-bold">
      Belajar dan <span class="text-teal-700">Berkembang</span> Tanpa Batas
    </h1>
    <p class="text-gray-600 text-lg">
      Gerai UMKM adalah sebuah bisnis sociopreneurship yang berfokus pada pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan mahasiswa, dan pelaku usaha menengah ke bawah untuk menciptakan solusi inovatif.
    </p>
    <button onclick="document.getElementById('trust-section').scrollIntoView({ behavior: 'smooth' });" 
    class="bg-teal-700 text-white px-8 py-3 rounded-full font-semibold text-lg">
Explore More
</button>

  
  </div>

  <div class="relative flex justify-center md:justify-end mb-8 md:mb-0">

    <!-- Mobile Image (Visible on small screens) -->
    <img src="{{ asset('assets/img/bannerMobile.png') }}" alt="Banner Mobile Image" class="block md:hidden w-96 rounded-lg">
    <img src="{{ asset('assets/img/bannerWeb.png') }}" alt="Banner Desktop Image" class="hidden md:block w-96 md:w-[500px] lg:w-[600px] rounded-lg">
  </div>
</section>


<!-- Conditional Menu Section for Mahasiswa -->
@auth
@if(auth()->user()->role == 'mahasiswa')
<section class="text-center py-16">
  <h2 class="text-2xl font-bold mb-8 text-teal-600">Menu</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
    <!-- Card Components for Menu Items -->
    <a href="{{ route('event') }}">
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/Blog.png') }}" alt="Galeri UMKM" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Artikel</p>
    </div>
  </a>
    <a href="https://wa.me/088290954001">
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ContactUs.png') }}" alt="Kategori" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Kontak Kami</p>
    </div>
  </a>
    <a href="{{ route('mahasiswa.chat') }}">
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ChatBot.png') }}" alt="Informasi Bisnis" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">ChatHub</p>
    </div>
  </a>
    <a href="{{ route('mahasiswa.chatbot') }}">
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ChatBot1.png') }}" alt="Chat" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">ChatBot</p>
    </div>
  </a>
  </div>
</section>
@endif
@endauth

<!-- Trust Section -->
<section id="trust-section">
  <div class="container mx-auto text-center px-6 md:px-0">
    <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
      <h2 class="text-2xl md:text-3xl font-bold">Lebih Dari 100 UMKM dan Mahasiswa Percaya Kepada Kami</h2>
      <p class="text-lg md:text-xl mt-4 text-white">Kami telah membantu UMKM dan Mahasiswa untuk berkembang dan mencapai potensi maksimal mereka.</p>
    </div>
  </div>
</section>

<section>
  <!-- SECTION LOGO UMKM -->
<div class="wrapper">
    <div class="item item1 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM1.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item2 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM2.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item3 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM3.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item4 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM4.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item5 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM5.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item6 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM6.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item7 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM7.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
    <div class="item item8 w-[200px] h-[100px] flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
      <img src="{{ asset ('assets/img/LogoUMKM8.png')}}" alt="Logo UMKM" class="h-full max-w-full object-contain grayscale hover:grayscale-0 transition duration-300 ease-in-out">
    </div>
  </div>
</section>
<br>
<!-- Section Project Content -->
<section class="py-16 px-4 mt-15">
  <div class="container mx-auto flex flex-wrap space-y-6 md:space-y-0 md:space-x-6">
      
     <!-- Introductory Text -->
<div class="w-full md:w-1/4 mb-5 fade-in flex items-center justify-center">
  <h2 class="text-2xl font-bold mb-4 text-custom-navy">Temukan Project dengan mudah</h2>
</div>

    

      <!-- Slider Wrapper with Job Cards -->
      <div class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <!-- Job Cards (Dynamically Generated) -->
          @foreach ($pekerjaan as $item)
              <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
                  <img src="{{ asset('assets/img/complete.png') }}" 
                  class="w-full h-32 object-contain rounded-lg mb-4" 
                  alt="{{ $item->posisi }}">
                  <h3 class="text-teal-600 font-semibold text-lg mb-1">{{ $item->posisi }}</h3>
                  <p class="text-gray-600 mb-1">{{ Str::limit($item->deskripsi, 100) }}</p>
                  <br>  
                  <span class="text-white bg-green-500 text-sm rounded-md ">{{ $item->tempat_bekerja }}</span>
                  @auth
                      @if(auth()->user()->role == 'mahasiswa')
                          <a href="{{ route('mahasiswa.pekerjaan.show', $item->id) }}" class="bg-teal-500 text-white mt-4 py-2 px-4 rounded-lg hover:bg-teal-600">
                              Lihat Detail
                          </a>
                      @else
                          <button onclick="showLoginModal()" class="bg-teal-500 text-white mt-4 py-2 px-4 rounded-lg hover:bg-teal-600">
                              Lihat Detail
                          </button>
                      @endif
                  @else
                      <button onclick="showLoginModal()" class="bg-teal-500 text-white mt-4 py-2 px-4 rounded-lg hover:bg-teal-600">
                          Lihat Detail
                      </button>
                  @endauth
              </div>
          @endforeach
      </div>
<br>
<br>
      <!-- Button Explore -->
<div class="w-full text-center mt-6">
  @auth
      @if(auth()->user()->role == 'mahasiswa')
          <a href="{{ route('mahasiswa.pekerjaan') }}" 
             class="border-2 border-teal-500 text-teal-500 py-2 px-4 rounded-lg transition hover:bg-teal-500 hover:text-white">
              Explore
          </a>
      @else
          <button onclick="showLoginModal()" 
                  class="border-2 border-teal-500 text-teal-500 py-2 px-4 rounded-lg transition hover:bg-teal-500 hover:text-white">
              Explore
          </button>
      @endif
  @else
      <button onclick="showLoginModal()" 
              class="border-2 border-teal-500 text-teal-500 py-2 px-4 rounded-lg transition hover:bg-teal-500 hover:text-white">
          Explore
      </button>
  @endauth
</div>
  </div>
</section>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 flex items-center justify-center hidden z-50" style="background-color: rgba(0, 0, 0, 0.3);">
  <div class="bg-white rounded-lg shadow-lg max-w-md mx-auto p-6" onclick="event.stopPropagation();">
      <h2 class="text-2xl font-bold mb-6 text-teal-600 text-center">Silakan Login untuk Mengakses Konten Ini</h2>
      <p class="mb-4 text-gray-600 text-center">Anda harus login untuk melihat proyek dan peluang terbaik kami.</p>
      <div class="text-center">
          <a href="{{ route('login') }}" class="bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-600">Login</a>
      </div>
  </div>
</div>

<!-- About Section -->
<section class="max-w-7xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8">
  <div class="md:w-1/2 space-y-6">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Tentang Kami</h2>
    <h3 class="text-2xl font-semibold text-green-600">Visi</h3>
    <p class="text-gray-600">
      Menjadi jembatan yang menghubungkan dunia pendidikan dan kewirausahaan, menciptakan ekosistem yang mendukung inovasi, pengembangan keterampilan, dan solusi nyata bagi tantangan yang dihadapi UMKM.
    </p>
    <h3 class="text-2xl font-semibold text-green-600">Misi</h3>
    <ul class="list-disc pl-6 space-y-2 text-gray-600">
      <li><span class="font-semibold text-teal-600">Memberikan Akses Edukasi Praktis:</span> Melibatkan mahasiswa dalam proyek-proyek UMKM untuk mengembangkan keterampilan kewirausahaan, manajemen, dan komunikasi.</li>
      <li><span class="font-semibold text-teal-600">Dukungan Teknologi dan Konsultasi bagi UMKM:</span> Membantu UMKM mengoptimalkan operasional bisnis dan meningkatkan daya saing di pasar melalui teknologi dan konsultasi.</li>
      <li><span class="font-semibold text-teal-600">Kolaborasi Berbasis Riset:</span> Mendorong kolaborasi antara akademisi dan UMKM untuk menghasilkan inovasi dan pengetahuan baru yang bermanfaat bagi pengembangan bisnis dan pendidikan.</li>
    </ul>
  </div>
  <div class="md:w-1/2 flex flex-col space-y-4">
    <div class="relative rounded-lg h-100 flex items-center justify-center">
      <img src="{{ asset('assets/img/wrg.png') }}" alt="Warung" class="object-cover w-full h-full rounded-lg">
    </div>
  </div>
</section>

<!-- Main Benefits Section -->
<section class="max-w-7xl mx-auto px-6 py-16">

  <!-- Section Title -->
  <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Manfaat untuk Pengguna</h2>

  <div class="md:flex md:space-x-12">

    <!-- Placeholder Image Grid -->
    <div class="grid grid-cols-2 gap-4 md:w-1/2 mb-8 md:mb-0">
    
      <div class="rounded-lg h-64 col-span-2"><img src="{{ asset ('assets/img/manfaat.png')}}" alt=""></div>
  
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Benefits List Section -->
    <div class="md:w-1/2 flex flex-col justify-center space-y-8">

      <!-- Benefit 1 -->
      <div class="flex items-start space-x-4">
        <div class="p-3">
          <img src="{{ asset('assets/img/Mahasiswa.png') }}" alt="">
        </div>
        <div>
          <h3 class="text-xl font-semibold text-gray-900">Mahasiswa</h3>
          <p class="text-gray-600">✔️<span class="font-bold ">Kesempatan Belajar Praktis</span> Gerai UMKM memberi mahasiswa pengalaman langsung di lapangan melalui keterlibatan dalam proyek UMKM. Mereka bisa menerapkan teori dari kelas ke praktik nyata dan mendapatkan pengalaman berharga.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Pengembangan Keterampilan:</span> Melalui Gerai UMKM, mahasiswa dapat mengasah keterampilan kewirausahaan, komunikasi, dan manajemen proyek yang penting untuk karier masa depan.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Portfolio Pengalaman Nyata:</span> Proyek yang diikuti mahasiswa di Gerai UMKM bisa menambah nilai dalam portfolio mereka, berguna untuk melamar kerja atau memulai bisnis.</p>
        </div>
      </div>

      <!-- Benefit 2 -->
      <div class="flex items-start space-x-4">
        <div class="p-3">
          <img src="{{ asset('assets/img/UMKM.png') }}" alt="">
        </div>
        <div>
          <h3 class="text-xl font-semibold text-gray-900">UMKM</h3>
          <p class="text-gray-600">✔️<span class="font-bold ">Akses ke Teknologi dan Inovasi:</span> Gerai UMKM memudahkan pemilik UMKM untuk mengakses teknologi terkini, termasuk sistem POS yang mudah digunakan untuk pengelolaan usaha.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Bimbingan dan Konsultasi: </span> Pemilik usaha dapat berkonsultasi dengan mahasiswa, dosen, dan pakar di platform untuk mendapatkan wawasan baru, memperbaiki strategi, dan memperluas jaringan.</p>
        </div>
      </div>

      
    </div>
  </div>
</section>

<section class="py-10 px-6 md:px-16">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-xl font-semibold">Kategori UMKM</h2>
    <a href="{{ route('umkm.index.beranda') }}" class="text-teal-600 font-semibold hover:underline">Lihat Semua</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-6 gap-10 justify-items-center">
    <!-- F&B -->
    <a href="{{ route('umkm.index.beranda') }}#f-b">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoFnB.png') }}" alt="F&B" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold">F&B</p>
      </div>
    </a>

    <!-- Retail -->
    <a href="{{ route('umkm.index.beranda') }}#retail">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoRetail.png') }}" alt="Retail" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold">Retail</p>
      </div>
    </a>

    <!-- Jasa -->
    <a href="{{ route('umkm.index.beranda') }}#jasa">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoJasa.png') }}" alt="Jasa" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold">Jasa</p>
      </div>
    </a>

    <!-- Produksi -->
    <a href="{{ route('umkm.index.beranda') }}#produksi">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoProduksi.png') }}" alt="Produksi" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold">Produksi</p>
      </div>
    </a>

    <!-- Pendidikan -->
    <a href="{{ route('umkm.index.beranda') }}#pendidikan">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoEdu.png') }}" alt="Pendidikan" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold">Pendidikan</p>
      </div>
    </a>

    <!-- Kesehatan dan Kecantikan -->
    <a href="{{ route('umkm.index.beranda') }}#kesehatan-dan-kecantikan">
      <div class="flex flex-col items-center">
          <img src="{{ asset('assets/img/logoHealth.png') }}" alt="Kesehatan dan Kecantikan" class="w-20 h-20">
          <p class="mt-2 text-sm font-semibold text-center">Kesehatan &<br>Kecantikan</p>
      </div>
    </a>
  </div>
</section>





<!-- Artikel Terkini Section -->
<section class="py-10 px-6 md:px-16">
  <h2 class="text-2xl font-bold text-center mb-10">Artikel Terkini</h2>

  <div class="grid md:grid-cols-3 gap-10">
    @php
    // Select a random sample of 3 articles if there are more than 3, otherwise use all articles
    $items = $artikel->random(min(3, $artikel->count()));
    @endphp

    @foreach ($items as $item)
    @if ($item->foto)
    <!-- Article Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover-card transition-transform duration-200">
      <div class="relative">
        <!-- Article Image -->
        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">

        <!-- Date Tag Section -->
        <div class="absolute top-4 left-4 bg-white p-2 rounded-lg shadow-lg">
          <div class="text-xs font-semibold text-gray-600">
            <span class="font-bold text-teal-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
            {{ \Carbon\Carbon::parse($item->tanggal)->format('M Y') }}
          </div>
        </div>
      </div>

      <!-- Content Section -->
      <div class="p-6">
        <h3 class="font-semibold text-lg mb-2">
          <a href="{{ route('event.detail', $item->id) }}">{{ $item->judul }}</a>
        </h3>
        <p class="text-gray-600">{{ Str::limit($item->deskripsi, 100) }}</p>
        <div class="meta text-gray-500 mt-4">
          <span>by {{ $item->user->name ?? 'Unknown' }}</span>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>

  <!-- View All Button -->
  <div class="text-center mt-8">
    <a href="{{ route('event') }}" class="text-teal-600 border border-teal-600 px-4 py-2 rounded-full font-semibold hover:bg-teal-600 hover:text-white transition duration-200">
      Lihat Semua
    </a>
  </div>
</section>

@include('layouts.footer')

<!-- JavaScript for login check and custom alert from Syntax 1 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- JavaScript to Show Modal -->
<script>
  // Fungsi untuk menampilkan modal login
  function showLoginModal() {
      document.getElementById('loginModal').classList.remove('hidden');
  }

  // Fungsi untuk menutup modal login
  function hideLoginModal() {
      document.getElementById('loginModal').classList.add('hidden');
  }

  // Menambahkan event listener untuk menutup modal saat klik di luar modal
  document.getElementById('loginModal').addEventListener('click', function(event) {
      hideLoginModal();
  });
</script>




  @endsection
