<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        // Mendapatkan data konsultasi yang terkait dengan pengguna yang sedang login (UMKM)
        $userId = Auth::id();
        $konsultasi = Konsultasi::where('id_user', $userId)->get();

        return view('umkm.konsultasi.index', compact('konsultasi'));
    }

    public function indexall()
    {
        // Mendapatkan semua data konsultasi
        $konsultasi = Konsultasi::all();

        return view('superadmin.konsultasi.index', compact('konsultasi'));
    }

    public function showadmin($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        return view('superadmin.konsultasi.show', compact('konsultasi'));
    }

    public function updateJawaban(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'jawaban' => 'required|string',
        ]);

        // Find the konsultasi item by ID
        $konsultasi = Konsultasi::findOrFail($id);

        // Update the jawaban field
        $konsultasi->jawaban = $request->jawaban;
        $konsultasi->save();

        // Redirect back with a success message
        return redirect()->route('superadmin.konsultasi.show', $konsultasi->id)
            ->with('success', 'Jawaban berhasil diperbarui!');
    }
    /**
     * Show the form for creating a new consultation.
     */
    public function create()
    {
        return view('umkm.konsultasi.create');
    }

    /**
     * Store a newly created consultation in the database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status_aktivitas_bisnis' => 'required|in:aktif,tidak_aktif,Belum',
            'nama_pelaku_bisnis' => 'required|string|max:255',
            // 'tipe_identitas' => 'required|in:NPWP,NIK,NIB',
            // 'no_identitas' => 'required',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            // 'provinsi' => 'required|string|max:255',
            // 'kota' => 'required|string|max:255',
            'detail_kendala_bisnis' => 'required|string|max:255',
            'kendala_bisnis' => 'required|string|max:255',
            'kategori_kebutuhan' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string|max:255',
        ]);

        // Simpan data konsultasi baru
        Konsultasi::create([
            'id_user' => Auth::id(),
            'status_aktivitas_bisnis' => $request->status_aktivitas_bisnis,
            'nama_pelaku_bisnis' => $request->nama_pelaku_bisnis,
            // 'tipe_identitas' => $request->tipe_identitas,
            // 'no_identitas' => $request->no_identitas,
            'email' => $request->email,
            'alamat' => $request->alamat,
            // 'provinsi' => $request->provinsi,
            // 'kota' => $request->kota,
            'detail_kendala_bisnis' => $request->detail_kendala_bisnis,
            'kendala_bisnis' => $request->kendala_bisnis,
            'kategori_kebutuhan' => $request->kategori_kebutuhan,
            'deskripsi_masalah' => $request->deskripsi_masalah,
        ]);

        return redirect()->route('umkm.konsultasi.index')->with('success', 'Konsultasi berhasil ditambahkan');
    }

    /**
     * Show the form for editing an existing consultation.
     */
    public function edit($id)
    {
        $konsultasi = Konsultasi::where('id_user', Auth::id())->findOrFail($id);
        return view('umkm.konsultasi.edit', compact('konsultasi'));
    }

    /**
     * Update an existing consultation in the database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status_aktivitas_bisnis' => 'required|in:aktif,tidak_aktif,Belum',
            'nama_pelaku_bisnis' => 'required|string|max:255',
            'tipe_identitas' => 'required|in:NPWP,NIK,NIB',
            'no_identitas' => 'required|integer',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'detail_kendala_bisnis' => 'required|string|max:255',
            'kendala_bisnis' => 'required|string|max:255',
            'kategori_kebutuhan' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string|max:255',
        ]);

        // Temukan dan perbarui data konsultasi
        $konsultasi = Konsultasi::where('id_user', Auth::id())->findOrFail($id);
        $konsultasi->update($request->all());

        return redirect()->route('umkm.konsultasi.index')->with('success', 'Konsultasi berhasil diperbarui');
    }

    /**
     * Remove a consultation from the database.
     */
    public function destroy($id)
    {
        $konsultasi = Konsultasi::where('id_user', Auth::id())->findOrFail($id);
        $konsultasi->delete();

        return redirect()->route('umkm.konsultasi.index')->with('success', 'Konsultasi berhasil dihapus');
    }

    public function show($id)
    {
        $konsultasi = Konsultasi::where('id_user', Auth::id())->findOrFail($id);
        return view('umkm.konsultasi.show', compact('konsultasi'));
    }
}
