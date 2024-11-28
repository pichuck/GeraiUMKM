@extends('layouts.admin.app')

@section('title', 'UMKM / Tambah')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl bg-white p-8 shadow-lg rounded-lg">
            <form action="{{ route('superadmin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">UMKM Registration</h2>

                <!-- Section 1: Informasi Login -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Login</h3>

                    <!-- Email -->
                    <div class="flex flex-col">
                        <label for="email" class="text-gray-700 font-bold">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col">
                        <label for="password" class="text-gray-700 font-bold">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Section 2: Informasi UMKM -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi UMKM</h3>

                    <!-- Nama UMKM -->
                    <div class="flex flex-col">
                        <label for="nama_umkm" class="text-gray-700 font-bold">Nama UMKM</label>
                        <input type="text" id="nama_umkm" name="nama_umkm" required maxlength="255"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    {{-- Kategori --}}
                    <div class="flex flex-col">
                        <label for="kategori_umkm" class="text-gray-700 font-bold">Kategori UMKM</label>
                        <select id="kategori_umkm" name="kategori" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
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


                    <!-- Deskripsi -->
                    <div class="flex flex-col">
                        <label for="deskripsi" class="text-gray-700 font-bold">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                    </div>

                    {{-- <!-- Kategori -->
                    <div class="flex flex-col">
                        <label for="kategori" class="text-gray-700 font-bold">Kategori</label>
                        <input type="text" id="kategori" name="kategori" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div> --}}
                </div>

                <!-- Section 3: Foto -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Foto UMKM</h3>

                    <!-- Foto Profil -->
                    <div class="flex flex-col">
                        <label for="foto_profil" class="text-gray-700 font-bold">Foto Profil</label>
                        <input type="file" id="foto_profil" name="foto_profil" accept="image/jpeg, image/png"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    {{-- <!-- Foto Sampul -->
                    <div class="flex flex-col">
                        <label for="foto_sampul" class="text-gray-700 font-bold">Foto Sampul</label>
                        <input type="file" id="foto_sampul" name="foto_sampul" accept="image/jpeg, image/png" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div> --}}
                </div>

                <!-- Section 4: Informasi Lokasi -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Lokasi</h3>
                    <!-- Provinsi -->
                    {{-- <div class="flex flex-col">
                        <label for="provinsi" class="text-gray-700 font-bold">Provinsi</label>
                        <select id="provinsi" name="provinsi" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Provinsi</option>

                        </select>
                    </div> --}}

                    {{-- <!-- Kota -->
                    <div class="flex flex-col">
                        <label for="kota" class="text-gray-700 font-bold">Kota</label>
                        <select id="kota" name="kota" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Kota</option>

                            <!-- Add more options as needed -->
                        </select>
                    </div> --}}

                    {{-- <!-- Kecamatan -->
                    <div class="flex flex-col">
                        <label for="kecamatan" class="text-gray-700 font-bold">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Kecamatan</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div> --}}
                    <!-- Kode Pos -->
                    {{-- <div class="flex flex-col">
                        <label for="kode_pos" class="text-gray-700 font-bold">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div> --}}

                    <!-- Alamat -->
                    <div class="flex flex-col">
                        <label for="alamat" class="text-gray-700 font-bold">Alamat</label>
                        <textarea id="alamat" name="alamat" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                </div>

                <!-- Section 5: Informasi Tambahan -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Tambahan</h3>

                    <!-- Informasi Pemilik -->
                    <div class="flex flex-col">
                        <label for="informasi_pemilik" class="text-gray-700 font-bold">Informasi Pemilik</label>
                        <textarea id="informasi_pemilik" name="informasi_pemilik" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    {{--
                    <!-- Informasi Bisnis -->
                    <div class="flex flex-col">
                        <label for="informasi_bisnis" class="text-gray-700 font-bold">Informasi Bisnis</label>
                        <textarea id="informasi_bisnis" name="informasi_bisnis" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                    </div> --}}
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" id="submit-button"
                        class="bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-700 focus:outline-none">Register</button>
                    <a href="{{ route('superadmin.umkm') }}"
                        class="bg-gray-500 text-white py-3 px-8 rounded-lg hover:bg-gray-700 focus:outline-none">Kembali</a>
                </div>
            </form>
        </div>
    </div>

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
@endsection
