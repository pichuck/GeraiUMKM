<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\umkm;
use App\Models\artikel;
use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    // Menampilkan data UMKM
    public function index()
    {
        // Mendapatkan id user yang sedang login
        $userId = Auth::id();
        // Mengambil data UMKM berdasarkan id user yang login
        $umkm = umkm::where('id_user', $userId)->first();

        return view('umkm.index', compact('umkm'));
    }

    // Menampilkan data artikel
    public function indexArtikel()
    {
        $userId = auth()->user()->id;
        $artikel = artikel::where('id_user', $userId)->get();
        return view('umkm.artikel.index', compact('artikel'));
    }
    // Menampilkan data pekerjaan

    // Method show untuk menampilkan detail UMKM
    public function showUmkm($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        return view('umkm.show', compact('umkm'));
    }

    // Method untuk mengedit data UMKM
    public function editUmkm($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        return view('umkm.edit', compact('umkm'));
    }

    // Method untuk update data UMKM
    public function updateUmkm(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kategori' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'informasi_pemilik' => 'required|string',
            'informasi_bisnis' => 'required|string',
        ]);

        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        // Mengupdate data UMKM
        $umkm->update($request->all());

        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diperbarui');
    }

    // Method untuk menampilkan form create artikel
    public function createArtikel()
    {
        return view('umkm.artikel.create');
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
        $data = $request->only(['judul', 'isi', 'tanggal', 'category']);

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
        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil dibuat');
    }
    // Method untuk menampilkan detail artikel
    public function showArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('umkm.artikel.show', compact('artikel'));
    }
    // Method untuk menampilkan form edit artikel
    public function editArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('umkm.artikel.edit', compact('artikel'));
    }
    // Method untuk mengupdate artikel
    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string',
        ]);

        $artikel = artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }
    // Method untuk menghapus artikel
    public function destroyArtikel($id)
    {
        $artikel = artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }


    public function chat(){
        return view('umkm.chat.chat');
    }

}
