@include('layouts.header')

<!-- Search Section -->
<section class="bg-secondary text-primary py-9 pt-20 m-11">
    <div class="container mx-auto text-center px-6 md:px-0">
        <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold">Temukan Pekerjaan</h2>
            <h2 class="text-2xl md:text-3xl font-bold">Di Berbagai Bidang</h2>
        </div>
    </div>
</section>

<!-- Job Categories with Cards -->
<section id="jobs" class="py-16 px-10">
    <div class="container mx-auto">
        @foreach($categories as $category)
            <div class="category-section mb-10">
                <h3 class="text-xl font-bold mb-4">{{ $category }}</h3>
                <div class="flex overflow-x-scroll space-x-6">
                    @php
                        $jobs = App\Models\pekerjaan::where('kategori', $category)
                                    ->where('status', 'active')
                                    ->paginate(100);
                    @endphp

                    @foreach($jobs as $job)
                        @php
                            // Tentukan path gambar berdasarkan kategori
                            $imagePath = match($job->kategori) {
                                'Agrikultur' => asset('assets/img/Agrikultur.png'),
                                'Akuntansi' => asset('assets/img/Akuntansi.png'),
                                'Edukasi' => asset('assets/img/Edukasi.png'),
                                'Finance' => asset('assets/img/Finance.png'),
                                'Teknologi' => asset('assets/img/Teknologi.jpg'),
                                'Kesehatan' => asset('assets/img/Kesehatan.png'),
                                'Kreatif' => asset('assets/img/Kreatif.png'),
                                'Lingkungan' => asset('assets/img/Lingkungan.png'),
                                'Sosial' => asset('assets/img/Sosial.png'),
                                'Marketing' => asset('assets/img/Marketing.png'),
                                default => asset('assets/img/Lainnya.png'),
                            };
                        @endphp
                        <div class="w-80 flex-none bg-white rounded-lg shadow-md p-4 flex flex-col">
                            <img src="{{ $imagePath }}" class="w-full h-48 object-cover rounded-t-lg mb-4" alt="{{ $job->posisi }}">
                            <h5 class="font-bold">{{ $job->posisi }}</h5>
                            <strong class="text-gray-700">{{ $job->tempat_bekerja }}</strong>
                            <a href="{{ route('mahasiswa.pekerjaan.show', $job->id) }}" class="mt-auto bg-teal-500 text-white rounded-lg p-2 mt-4 text-center hover:bg-teal-600">Lihat Detail</a>
                        </div>
                    @endforeach
                </div>
                <!-- Explore More Button with Background and Hover Effect -->
                <p class="mt-4 text-center">
                    <a href="{{ route('mahasiswa.pekerjaan.category', $category) }}" class="bg-teal-500 text-white px-4 py-2 rounded-full font-semibold hover:bg-teal-600 transition duration-200 inline-block">
                        Explore More in {{ $category }}
                    </a>
                </p>
            </div>
        @endforeach
    </div>
</section>

<!-- Pagination Section -->
<div class="d-flex justify-content-center mt-4 mb-5">
    {{ $jobs->links() }}
</div>

<!-- JavaScript for Hamburger Menu -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

@include('layouts.footer')
