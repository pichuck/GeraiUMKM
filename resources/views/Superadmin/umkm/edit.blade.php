@extends('layouts.admin.app')

@section('title', 'UMKM / Edit')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl bg-white p-8 shadow-lg rounded-lg">
            <form action="{{ route('superadmin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT') <!-- Gunakan method PUT untuk update data -->
                <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Edit UMKM</h2>

                <!-- Section 1: Informasi Login -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Login</h3>

                    <!-- Email -->
                    <div class="flex flex-col">
                        <label for="email" class="text-gray-700 font-bold">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $umkm->email) }}"
                            required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col">
                        <label for="password" class="text-gray-700 font-bold">Password (Kosongkan jika tidak ingin
                            mengubah)</label>
                        <input type="password" id="password" name="password"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Section 2: Informasi UMKM -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi UMKM</h3>

                    <!-- Nama UMKM -->
                    <div class="flex flex-col">
                        <label for="nama_umkm" class="text-gray-700 font-bold">Nama UMKM</label>
                        <input type="text" id="nama_umkm" name="nama_umkm"
                            value="{{ old('nama_umkm', $umkm->nama_umkm) }}" required maxlength="255"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="kategori_umkm" class="text-gray-700 font-bold">Kategori UMKM</label>
                        <select id="kategori_umkm" name="kategori" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Kategori</option>
                            <option value="F&B" {{ old('kategori') == 'F&B' ? 'selected' : '' }}>F&B</option>
                            <option value="Retail" {{ old('kategori') == 'Retail' ? 'selected' : '' }}>Retail</option>
                            <option value="Jasa" {{ old('kategori') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            <option value="Produksi" {{ old('kategori') == 'Produksi' ? 'selected' : '' }}>Produksi</option>
                            <option value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan
                            </option>
                            <option value="Kesehatan dan Kecantikan"
                                {{ old('kategori') == 'Kesehatan dan Kecantikan' ? 'selected' : '' }}>Kesehatan dan
                                Kecantikan</option>
                            <option value="Teknologi dan Digital"
                                {{ old('kategori') == 'Teknologi dan Digital' ? 'selected' : '' }}>Teknologi dan Digital
                            </option>
                            <option value="Pariwisata dan Hospitality"
                                {{ old('kategori') == 'Pariwisata dan Hospitality' ? 'selected' : '' }}>Pariwisata dan
                                Hospitality</option>
                            <option value="Agribisnis" {{ old('kategori') == 'Agribisnis' ? 'selected' : '' }}>Agribisnis
                            </option>
                            <option value="Kesenian dan Hiburan"
                                {{ old('kategori') == 'Kesenian dan Hiburan' ? 'selected' : '' }}>Kesenian dan Hiburan
                            </option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>



                    <!-- Deskripsi -->
                    <div class="flex flex-col">
                        <label for="deskripsi" class="text-gray-700 font-bold">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                    </div>
                </div>

                <!-- Section 3: Foto -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Foto UMKM</h3>

                    <!-- Foto Profil -->
                    <div class="flex flex-col">
                        <label for="foto_profil" class="text-gray-700 font-bold">Foto Profil</label>
                        <input type="file" id="foto_profil" name="foto_profil" accept="image/jpeg, image/png"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                        @if ($umkm->foto_profil)
                            <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}" alt="Foto Profil"
                                class="mt-2 w-32 h-32 rounded">
                        @endif
                    </div>

                    <!-- Foto Sampul -->
                    <div class="flex flex-col">
                        <label for="foto_sampul" class="text-gray-700 font-bold">Foto Sampul</label>
                        <input type="file" id="foto_sampul" name="foto_sampul" accept="image/jpeg, image/png"
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                        @if ($umkm->foto_sampul)
                            <img src="{{ Storage::url('umkm/foto_sampul/' . $umkm->foto_sampul) }}" alt="Foto Sampul"
                                class="mt-2 w-full rounded">
                        @endif
                    </div>
                </div>

                <!-- Section 4: Informasi Lokasi -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Lokasi</h3>

                    <!-- Provinsi -->
                    <div class="flex flex-col">
                        <label for="provinsi" class="text-gray-700 font-bold">Provinsi</label>
                        <select id="provinsi" name="provinsi" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">{{ $umkm->provinsi }}</option>
                        </select>
                    </div>

                    <!-- Kota -->
                    <div class="flex flex-col">
                        <label for="kota" class="text-gray-700 font-bold">Kota</label>
                        <select id="kota" name="kota" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">{{ $umkm->kota }}</option>
                        </select>
                    </div>

                    <!-- Kecamatan -->
                    <div class="flex flex-col">
                        <label for="kecamatan" class="text-gray-700 font-bold">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">{{ $umkm->kecamatan }}</option>
                        </select>
                    </div>

                    <!-- Kode Pos -->
                    <div class="flex flex-col">
                        <label for="kode_pos" class="text-gray-700 font-bold">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos"
                            value="{{ old('kode_pos', $umkm->kode_pos) }}" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Alamat -->
                    <div class="flex flex-col">
                        <label for="alamat" class="text-gray-700 font-bold">Alamat</label>
                        <textarea id="alamat" name="alamat" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">{{ old('alamat', $umkm->alamat) }}</textarea>
                    </div>
                </div>

                <!-- Section 5: Informasi Tambahan -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-700 bg-blue-100 p-2 rounded">Informasi Tambahan</h3>

                    <!-- Informasi Pemilik -->
                    <div class="flex flex-col">
                        <label for="informasi_pemilik" class="text-gray-700 font-bold">Informasi Pemilik</label>
                        <textarea id="informasi_pemilik" name="informasi_pemilik" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">{{ old('informasi_pemilik', $umkm->informasi_pemilik) }}</textarea>
                    </div>

                    <!-- Informasi Bisnis -->
                    <div class="flex flex-col">
                        <label for="informasi_bisnis" class="text-gray-700 font-bold">Informasi Bisnis</label>
                        <textarea id="informasi_bisnis" name="informasi_bisnis" required
                            class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">{{ old('informasi_bisnis', $umkm->informasi_bisnis) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white p-3 rounded-lg font-bold hover:bg-blue-500 transition">
                        Update UMKM
                    </button>
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
