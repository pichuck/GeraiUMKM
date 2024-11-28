<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register UMKM Gerai UMKM</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon" type="image/png">
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex font-poppins">

<!-- Left Side (White Background with Registration Form) -->
<div class="w-full md:w-1/2 h-full bg-white flex items-center justify-center">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg ">

        <!-- Logo -->
        <div class="flex justify-center mb-6 mt-12">
           <a href="{{ route('index') }}"> <img src="{{ asset('assets/img/logoText.png') }}" alt="POS UMKM Logo" style="height: 45px;"></a>
        </div>

        <!-- Form Heading -->
        <p class="text-center text-gray-500 mb-8">buat akun anda sebagai UMKM</p>

        <!-- Error Notification -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- UMKM Registration Form -->
        <form action="{{ route('umkmregister') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Email and Password -->
            <div class="flex space-x-4">
                <div class="relative w-1/2">
                    <label for="email" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@company.com" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative w-1/2">
                    <label for="password" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Nama UMKM -->
            <div class="relative">
                <label for="nama_umkm" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Nama UMKM</label>
                <input type="text" id="nama_umkm" name="nama_umkm" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2" required>
            </div>

            <!-- Kategori UMKM and Pemilik UMKM -->
            <div class="flex space-x-4">
                <div class="relative w-1/2">
                    <label for="kategori_umkm" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Kategori UMKM</label>
                    <select id="kategori_umkm" name="kategori" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
                        <option value="">Pilih Kategori</option>
                        <option value="F&B">F&B</option>
                        <option value="Retail">Retail</option>
                        <option value="Jasa">Jasa</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                        <option value="Teknologi dan Digital">Teknologi dan Digital</option>
                        <option value="Pariwisata dan Hospitality">Pariwisata dan Hospitality</option>
                        <option value="Agribisnis">Agribisnis</option>
                        <option value="Kesenian dan Hiburan">Kesenian dan Hiburan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="relative w-1/2">
                    <label for="informasi_pemilik" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Pemilik UMKM</label>
                    <input type="text" id="informasi_pemilik" name="informasi_pemilik" placeholder="Nama Pemilik" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2" required>
                </div>
            </div>

            <!-- Alamat Lengkap -->
            <div class="relative">
                <label for="alamat" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Alamat Lengkap</label>
                <input type="text" id="alamat" name="alamat" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2" required>
            </div>

            <!-- Deskripsi -->
            <div class="relative">
                <label for="deskripsi" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2" required></textarea>
            </div>

            <!-- Upload Foto Profile -->
            <div class="relative">
                <label for="foto_profil" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-bold">Upload Foto Profile</label>
                <input type="file" id="foto_profil" name="foto_profil" accept="image/*" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2">
            </div>

            <!-- Daftar Button -->
            <button type="submit" class="w-full p-3 bg-blue-400 text-white font-semibold rounded-lg hover:bg-blue-500 transition">Daftar</button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login Disini</a></p>
        </div>

    </div>
</div>

<!-- Right Side (Gradient Background with Centered Logo) - Hidden on Small Screens -->
<div class="hidden md:flex w-full md:w-1/2 min-h-screen bg-gradient-to-r from-custom-start to-custom-end items-center justify-center">
    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-1/3">
</div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        let selectedProvinceName = ''; // Variable to store the selected province name
        let selectedKotaName = ''; // Variable to store the selected city name
        let selectedKecamatanName = ''; // Variable to store the selected district name

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML +=
                        `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                });
            });

        // Load cities (regencies) based on selected province
        provinsiSelect.addEventListener('change', function() {
            const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute(
                'data-id');
            selectedProvinceName = this.value; // Store selected province name
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML +=
                                `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
                        });
                        kecamatanSelect.innerHTML =
                            '<option value="">Pilih Kecamatan</option>'; // Reset kecamatan
                    });
            } else {
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Load districts based on selected city (regency)
        kotaSelect.addEventListener('change', function() {
            const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
            selectedKotaName = this.value; // Store selected city name
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML +=
                                `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Store selected district name
        kecamatanSelect.addEventListener('change', function() {
            selectedKecamatanName = this.value;
        });

        // Assuming you have a form submission or some event where you send the data
        document.getElementById('submit-button').addEventListener('click', function() {
            const formData = {
                province_name: selectedProvinceName,
                city_name: selectedKotaName,
                district_name: selectedKecamatanName
            };

            // Now you can send formData to your server via fetch or AJAX
            console.log(formData); // This is where you'd actually send the data to your server
        });
    });
</script>

</html>
