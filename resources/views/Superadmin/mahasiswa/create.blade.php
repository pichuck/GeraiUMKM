@extends('layouts.admin.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<section class="section py-6">
    <div class="container mx-auto ">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-600 p-4">
                    <h2 class="text-2xl font-bold text-white text-center">Form Tambah Mahasiswa</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('superadmin.mahasiswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Personal Information -->
                            <div class="col-span-2">
                                <h3 class="text-lg font-semibold mb-3">Informasi Pribadi</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @error('nama')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" id="password" name="password" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @error('tanggal_lahir')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @error('no_hp')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Education and Work -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-semibold mb-3">Pendidikan dan Pekerjaan</h3>
                            </div>
                            <div>
                                <label for="universitas" class="block text-sm font-medium text-gray-700">Universitas</label>
                                <input type="text" id="universitas" name="universitas" value="{{ old('universitas') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                @error('universitas')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                @error('pekerjaan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="penghasilan" class="block text-sm font-medium text-gray-700">Penghasilan</label>
                                <input type="text" id="penghasilan" name="penghasilan" value="{{ old('penghasilan') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                @error('penghasilan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address Information -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-semibold mb-3">Informasi Alamat</h3>
                            </div>
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <select id="provinsi" name="provinsi" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                @error('provinsi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                <select id="kota" name="kota" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Pilih Kota</option>
                                </select>
                                @error('kota')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                @error('kode_pos')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea id="alamat" name="alamat" rows="3" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Profile Picture -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-semibold mb-3">Foto Profil</h3>
                                <div class="mt-1 flex items-center">
                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                    <input type="file" id="foto_profil" name="foto_profil" accept="image/*" required
                                           class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                </div>
                                @error('foto_profil')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button id="submit-button" type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Tambah Mahasiswa
                            </button>
                            <a href="{{ route('superadmin.mahasiswa') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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
