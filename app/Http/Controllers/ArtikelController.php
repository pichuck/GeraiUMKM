<?php

namespace App\Http\Controllers;
use App\Models\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = artikel::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data artikel',
            'data'    => $artikel
        ], 200);
    }

    public function show($id)
    {
        $artikel = artikel::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data artikel',
            'data'    => $artikel
        ], 200);
    }

    public function store(Request $request)
    {
        $artikel = artikel::create([
            'id_umkm' => $request->id_umkm,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'tanggal' => $request->tanggal,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data artikel berhasil disimpan',
            'data'    => $artikel
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $artikel = artikel::findOrfail($id);
        $artikel->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data artikel berhasil diupdate',
            'data'    => $artikel
        ], 200);
    }

    public function destroy($id)
    {
        $artikel = artikel::findOrfail($id);
        $artikel->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data artikel berhasil dihapus',
            'data'    => $artikel
        ], 200);
    }
}
