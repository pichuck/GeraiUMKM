<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Mahasiswa Gerai UMKM</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon" type="image/png">

    @vite('resources/css/app.css')
</head>

<body class="bg-white min-h-screen flex font-poppins">

    <!-- Left Side (White Background with Registration Form) -->
    <div class="w-full md:w-1/2 h-full bg-white flex items-center justify-center">
       
        <!-- Error Notification -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
        </div>
        @endif

        <!-- Registration Form -->
        <div class="w-full max-w-lg p-8 py-10 bg-white rounded-lg shadow-md">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logoText.png') }}" alt="POS UMKM Logo" style="height: 45px;"></a>
            </div>

            <p class="text-center text-gray-500 mb-8">Buat akun Anda sebagai mahasiswa</p>

            <!-- Error Notification -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
            </div>
            @endif

            <!-- Registration Form -->
            <form class="space-y-4" action="{{ route('registermahasiswa') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <!-- Nama Panjang -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Panjang</label>
                        <input type="text" name="nama" id="nama" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('nama') border-red-500 @enderror">
                        @error('nama')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" placeholder="name@company.com" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('email') border-red-500 @enderror">
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('password') border-red-500 @enderror">
                        @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Asal Universitas -->
                    <div>
                        <label for="universitas" class="block text-sm font-medium text-gray-700">Asal Universitas</label>
                        <input type="text" name="universitas" id="universitas" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('universitas') border-red-500 @enderror">
                        @error('universitas')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" name="no_hp" id="no_hp" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Pemasukan -->
                    <div>
                        <label for="penghasilan" class="block text-sm font-medium text-gray-700">Pemasukan</label>
                        <input type="number" name="penghasilan" id="penghasilan" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Upload Foto Profil -->
                    <div>
                        <label for="foto_profil" class="block text-sm font-medium text-gray-700">Upload Foto Profil</label>
                        <input type="file" name="foto_profil" id="foto_profil" accept="image/*" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Provinsi -->
                    <div>
                        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select name="provinsi" id="provinsi" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>

                    <!-- Kota -->
                    <div>
                        <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                        <select name="kota" id="kota" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            <option value="">Pilih Kota</option>
                        </select>
                    </div>

                    <!-- Kecamatan -->
                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>

                    <!-- Kode Pos -->
                    <div>
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Alamat Lengkap -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" rows="3" required
                            class="mt-1 block w-full rounded-md border-transparent shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                    </div>
                </div>



                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full py-3 px-4 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Buat Akun</button>
                </div>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">Sudah Punya akun? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login Here</a></p>
                </div>
        </div>
    </div>

    <!-- Right Side (Gradient Background with Centered Logo) -->
    <div class="hidden md:flex w-full md:w-1/2 min-h-screen bg-gradient-to-r from-custom-start to-custom-end items-center justify-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-1/3">
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML += `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                });
            });

        // Add event listeners to load cities and districts based on province selection
        provinsiSelect.addEventListener('change', function() {
            const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute('data-id');
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML += `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
                        });
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    });
            } else {
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        kotaSelect.addEventListener('change', function() {
            const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML += `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });
    });
</script>



</html>