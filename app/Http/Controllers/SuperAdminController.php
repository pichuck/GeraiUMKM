<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\User;
use App\Models\artikel;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function indexMahasiswa()
    {
        $mahasiswa = mahasiswa::all();
        return view('superadmin.mahasiswa.index', compact('mahasiswa'));
    }

    public function chat(){
        return view('superadmin.chat.chat');
    }

    public function createMahasiswa()
    {
        return view('superadmin.mahasiswa.create');
    }

    public function showMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('superadmin.mahasiswa.show', compact('mahasiswa'));
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'penghasilan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            // Store the profile picture
            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);

            // Create User
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'mahasiswa',
            ]);

            // Create Mahasiswa profile
            mahasiswa::create([
                'id_user' => $user->id,
                'nama_mahasiswa' => $request->nama,
                'universitas' => $request->universitas,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'penghasilan' => $request->penghasilan,
                'pekerjaan' => $request->pekerjaan,
                'foto_profil' => $fileName,
                'provinsi_mahasiswa' => $request->provinsi,
                'kota_mahasiswa' => $request->kota,
                'kecamatan_mahasiswa' => $request->kecamatan,
                'kode_pos' => $request->kode_pos,
                'alamat_mahasiswa' => $request->alamat,
            ]);

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in storeMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan mahasiswa');
        }
    }

    public function destroyMahasiswa($id)
    {
        try {
            $mahasiswa = mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            $mahasiswa->user->delete();

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error in destroyMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus mahasiswa');
        }
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('superadmin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'penghasilan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
            'foto_profil' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            $mahasiswa = mahasiswa::findOrFail($id);

            if ($request->hasFile('foto_profil')) {
                $fileName = time() . '.' . $request->foto_profil->extension();
                $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);
                $mahasiswa->foto_profil = $fileName;
            }

            $mahasiswa->update($request->all());

            if ($request->filled('password')) {
                $mahasiswa->user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in updateMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui mahasiswa');
        }
    }

    // Manajemen data UMKM

    // Menampilkan data Umkm yang active
    public function indexUmkm()
    {

        $umkm = umkm::whereHas('user', function ($query) {
            $query->where('status', 'active');
        })->get();
        return view('superadmin.umkm.index', compact('umkm'));
    }

    public function verifikasiUmkm()
    {
        // Mendapatkan UMKM yang user-nya berstatus inactive
        $umkm = umkm::whereHas('user', function ($query) {
            $query->where('status', 'inactive');
        })->get();

        // Mengembalikan view beserta data UMKM yang tidak aktif
        return view('superadmin.verifikasi.index', compact('umkm'));
    }

    public function verify($id)
    {
        $umkm = umkm::findOrFail($id);
        $user = $umkm->user; // Ambil user terkait

        // Ubah status user menjadi active
        $user->status = 'active';
        $user->save();

        return redirect()->route('superadmin.verifikasi', $umkm->id)->with('success', 'UMKM berhasil diverifikasi dan status diubah menjadi active.');
    }

    public function tinjau($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        // Mengirim data UMKM ke view untuk ditinjau
        return view('superadmin.verifikasi.tinjau', compact('umkm'));
    }

    public function createUmkm()
    {
        return view('superadmin.umkm.create');
    }

    public function showUmkm(Request $request, $id){
        $umkm = umkm::findOrFail($id);
        return view('superadmin.umkm.show', compact('umkm'));
    }

    // Assuming you have imported the necessary classes at the top of your controller file

    public function storeUmkm(Request $request)
    {
        $validator = $this->validateUMKM($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $fotoProfil = $this->handleProfilePhoto($request);

        // Transaction to ensure both user and UMKM are created or none at all
        DB::beginTransaction();
        try {
            $user = $this->createUser($request);

            $this->createUMKMProfile($request, $user->id, $fotoProfil);

            DB::commit();

            return redirect()->route('superadmin.umkm')->with('success', 'Akun UMKM berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Error in registerumkm: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:6', 'confirmed'],
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('status', 'Password successfully updated');
    }

    public function gantipass(){
        return view('superadmin.password.password');
    }

    private function validateUMKM(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'informasi_pemilik' => 'required|string',
            'kategori' => 'required|string|in:F&B,Retail,Jasa,Produksi,Pendidikan,Kesehatan dan Kecantikan,Teknologi dan Digital,Pariwisata dan Hospitality,Agribisnis,Kesenian dan Hiburan,Lainnya'
        ]);
    }

    private function handleProfilePhoto(Request $request)
    {
        return $request->hasFile('foto_profil') ? $this->renameAndStoreFile($request->file('foto_profil'), 'umkm/foto_profil', 'profil') : null;
    }

    private function createUser(Request $request)
    {
        return User::create([
            'name' => $request->nama_umkm,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'umkm',
            'status' => 'active',
        ]);
    }

    private function createUMKMProfile(Request $request, $userId, $fotoProfil)
    {
        Umkm::create([
            'id_user' => $userId,
            'nama_umkm' => $request->nama_umkm,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,  // Make sure to capture and save this field from the request
            'foto_profil' => $fotoProfil,
            'informasi_pemilik' => $request->informasi_pemilik,
        ]);
    }

    // Global function or helper function
    public function renameAndStoreFile($file, $folder, $prefix)
    {
        $extension = $file->getClientOriginalExtension();
        $newFileName = $prefix . '_' . time() . '.' . $extension;
        $file->storeAs($folder, $newFileName, 'public');
        return $newFileName;
    }

    public function editUmkm($id)
    {
        $umkm = umkm::findOrFail($id);
        return view('superadmin.umkm.edit', compact('umkm'));
    }

    public function updateUmkm(Request $request, $id)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string',
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kategori' => 'required|string',
            'foto_profil' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'informasi_pemilik' => 'required|string',
            'informasi_bisnis' => 'required|string',
        ]);

        try {
            $umkm = umkm::findOrFail($id);

            if ($request->hasFile('foto_profil')) {
                $fotoProfil = $request->file('foto_profil')->store('umkm/foto_profil', 'public');
                $umkm->foto_profil = $fotoProfil;
            }

            if ($request->hasFile('foto_sampul')) {
                $fotoSampul = $request->file('foto_sampul')->store('umkm/foto_sampul', 'public');
                $umkm->foto_sampul = $fotoSampul;
            }

            $umkm->update($request->all());

            if ($request->filled('password')) {
                $umkm->user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect()->route('superadmin.umkm.index')->with('success', 'UMKM berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in updateUmkm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui UMKM');
        }
    }

    public function destroyUmkm($id)
    {
        try {
            $umkm = umkm::findOrFail($id);
            $umkm->delete();
            $umkm->user->delete();

            return redirect()->route('superadmin.umkm')->with('success', 'UMKM berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error in destroyUmkm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus UMKM');
        }
    }

    public function indexArtikel()
    {
        $userId = auth()->user()->id;
        $artikel = artikel::where('id_user', $userId)->get();
        return view('superadmin.artikel.index', compact('artikel'));
    }
    public function createArtikel()
    {
        return view('superadmin.artikel.create');
    }

    // Method untuk menyimpan data artikel baru
    public function storeArtikel(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'category' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi basic
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $image = getimagesize($request->file('foto'));
            $width = $image[0];
            $height = $image[1];

            // Cek ukuran foto berdasarkan kategori yang dipilih
            if ($request->category == 'event' && ($width != 3200 || $height != 1550)) {
                return redirect()->back()->withErrors(['foto' => 'Image harus berukuran 3200 x 1550 untuk Event category.'])->withInput();
            }
        }

        // Buat array untuk menyimpan data artikel
        $data = $request->only(['judul', 'isi', 'tanggal','category']);

        // Menyimpan id_user dari user yang sedang login
        $data['id_user'] = auth()->user()->id;

        // Cek apakah gambar diupload
        if ($request->hasFile('foto')) {
            // Simpan foto ke folder 'public/uploads/artikel'
            $path = $request->file('foto')->store('uploads/artikel', 'public');

            // Tambahkan path foto ke dalam data artikel
            $data['foto'] = $path;
        }

        // Simpan artikel ke database
        artikel::create($data);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('superadmin.artikel.index')->with('success', 'Artikel berhasil dibuat');
    }
    // Method untuk menampilkan detail artikel
    public function showArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('superadmin.artikel.show', compact('artikel'));
    }
    // Method untuk menampilkan form edit artikel
    public function editArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('superadmin.artikel.edit', compact('artikel'));
    }
    // Method untuk mengupdate artikel
    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string'
        ]);

        $artikel = artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('superadmin.artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }
    // Method untuk menghapus artikel
    public function destroyArtikel($id)
    {
        $artikel = artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('superadmin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
