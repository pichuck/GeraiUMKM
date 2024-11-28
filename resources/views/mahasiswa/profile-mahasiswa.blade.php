@include('layouts.header')

@if ($errors->any())
    <div class="container mx-auto my-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">Something went wrong.</span>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<br>
<div class="max-w-5xl mx-auto p-6 mt-11">
    <!-- Profile Header -->
    <div class="flex items-center space-x-6 bg-white p-8 rounded-lg shadow-md">
        <img src="{{ asset($mahasiswa && $mahasiswa->foto_profil ? 'uploads/mahasiswa/' . $mahasiswa->foto_profil : 'images/default.png') }}"
            alt="Profile Image" class="w-24 h-24 rounded-full border-4 border-teal-300 object-cover">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold text-yellow">{{ $mahasiswa->nama_mahasiswa ?? 'N/A' }}</h1>
            <p class="text-gray-600">{{ $mahasiswa->universitas ?? 'N/A' }}</p>
            <p class="text-gray-600">{{ $mahasiswa->kota_mahasiswa ?? 'N/A' }},
                {{ $mahasiswa->provinsi_mahasiswa ?? 'N/A' }}</p>
        </div>
        <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}"
            class="text-teal-700 font-semibold bg-gray-100 px-4 py-2 rounded-md hover:bg-gray-200">
            Edit Profile
        </a>
    </div>

    <div class="flex gap-8 mt-8">
        <!-- Detail Profil Section -->
        <div class="bg-white p-6 rounded-lg shadow-md w-1/2">
            <div class="flex justify-between items-center mb-4 border-b">
                <h3 class="text-lg font-bold">Detail Profil</h3>
                <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}"
                    class="text-teal-700 font-semibold flex items-center">
                    Edit
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12h.01m-3.828-6.586a2 2 0 112.828 2.828L7.828 15.172a4 4 0 01-1.707 1.414L3 17l.414-3.121a4 4 0 011.414-1.707l7.758-7.758z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                <div>
                    <p class="text-sm text-gray-500">Tanggal Lahir</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->tanggal_lahir ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Jenis Kelamin</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->jenis_kelamin ?? 'N/A' }}</p>
                </div>
                <div>
                    <gh class="text-sm text-gray-500">Pekerjaan</p>
                        <p class="text-base text-gray-800">{{ $mahasiswa->pekerjaan ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Nomor Telepon</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->no_hp ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="bg-white p-6 rounded-lg shadow-md w-1/2">
            <div class="flex justify-between items-center mb-4 border-b ">
                <h3 class="text-lg font-bold">Alamat</h3>
                <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}"
                    class="text-teal-700 font-semibold flex items-center">
                    Edit
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12h.01m-3.828-6.586a2 2 0 112.828 2.828L7.828 15.172a4 4 0 01-1.707 1.414L3 17l.414-3.121a4 4 0 011.414-1.707l7.758-7.758z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                <div>
                    <p class="text-sm text-gray-500">Provinsi</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->provinsi_mahasiswa ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Kota/Kabupaten</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->kota_mahasiswa ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Kecamatan</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->kecamatan_mahasiswa ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Kode Pos</p>
                    <p class="text-base text-gray-800">{{ $mahasiswa->kode_pos ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

<!-- Card Active Project -->
<div class="bg-white p-8 rounded-lg shadow-md mt-8">
    <h3 class="text-lg font-bold border-b pb-2 mb-4">Active Project</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @if (count($projectsData['active']) == 0)
            <p class="text-gray-500">Data tidak ditemukan</p>
        @else
            @foreach ($projectsData['active'] as $item)
                <div class="bg-teal-200 p-4 rounded-lg shadow-lg hover:bg-teal-300 transition duration-300">
                    <h4 class="text-lg font-bold text-teal-800">{{ $item->project->posisi }}</h4>
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Card Project History -->
<div class="bg-white p-8 rounded-lg shadow-md mt-8">
    <h3 class="text-lg font-bold border-b pb-2 mb-4">Project History</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @if (count($projectsData['history']) == 0)
            <p class="text-gray-500">Data tidak ditemukan</p>
        @else
            @foreach ($projectsData['history'] as $item)
                <div class="bg-red-200 p-4 rounded-lg shadow-lg hover:bg-red-300 transition duration-300">
                    <h4 class="text-lg font-bold text-red-800">{{ $item->project->posisi }}</h4>
                </div>
            @endforeach
        @endif
    </div>
</div>
</div>

<button id="scrollToTop"
    class="fixed bottom-8 right-8 bg-teal-600 text-white p-3 rounded-full shadow-lg hover:bg-teal-700 transition duration-300"
    style="display: none;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
    <!-- Inline SVG for Arrow Up -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
    </svg>
</button>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Scroll to Top Button Functionality
    const scrollButton = document.getElementById('scrollToTop');
    window.onscroll = () => {
        scrollButton.style.display = (window.scrollY > 20) ? 'block' : 'none';
    };

    // Modal function for achievements
    function openAchievementModal(applyId) {
        document.getElementById('achievementApplyId').value = applyId;
        const modal = new bootstrap.Modal(document.getElementById('achievementModal'));
        modal.show();
    }

    window.openAchievementModal = openAchievementModal;
</script>
@include('layouts.footer')


</body>

</html>
