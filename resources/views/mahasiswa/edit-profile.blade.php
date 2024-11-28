@include('layouts.header')
<br>
<br>
<br>
<br>
<div class=" mx-auto mt-30 px-4">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-teal-400 to-teal-600 text-white p-6">
            <h2 class="text-center text-2xl font-semibold">Edit Profile</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('mahasiswa.profile.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Mahasiswa -->
                <div class="mb-4">
                    <label for="nama_mahasiswa" class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" value="{{ $mahasiswa->nama_mahasiswa }}" required>
                </div>

                <!-- Universitas -->
                <div class="mb-4">
                    <label for="universitas" class="block text-gray-700 font-semibold mb-1">Universitas</label>
                    <input type="text" name="universitas" id="universitas" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" value="{{ $mahasiswa->universitas }}" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" value="{{ $mahasiswa->tanggal_lahir }}" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700 font-semibold mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" required>
                        <option value="L" {{ $mahasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $mahasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-700 font-semibold mb-1">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" value="{{ $mahasiswa->no_hp }}" required>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat_mahasiswa" class="block text-gray-700 font-semibold mb-1">Alamat</label>
                    <input type="text" name="alamat_mahasiswa" id="alamat_mahasiswa" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" value="{{ $mahasiswa->alamat_mahasiswa }}" required>
                </div>

                <!-- Foto Profil -->
                <div class="mb-6">
                    <label for="foto_profil" class="block text-gray-700 font-semibold mb-1">Foto Profil</label>
                    <input type="file" name="foto_profil" id="foto_profil" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-teal-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400">Simpan</button>
                    <a href="{{ route('mahasiswa.profile') }}" class="bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded-lg shadow hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
