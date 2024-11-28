<?php

namespace App\Http\Controllers;
use App\Models\pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = pesan::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pesan',
            'data'    => $pesan
        ], 200);
    }

    public function show($id)
    {
        $pesan = pesan::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data pesan',
            'data'    => $pesan
        ], 200);
    }

    public function store(Request $request)
    {
        $pesan = pesan::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_umkm' => $request->id_umkm,
            'id_pengirim' => $request->id_pengirim,
            'pesan' => $request->pesan,
            'tanggal' => $request->tanggal,
            'is_read' => $request->is_read,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pesan berhasil disimpan',
            'data'    => $pesan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pesan = pesan::findOrfail($id);
        $pesan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pesan berhasil diupdate',
            'data'    => $pesan
        ], 200);
    }

    public function destroy($id)
    {
        $pesan = pesan::findOrfail($id);
        $pesan->delete();
        return response()->json([
            'success' => true,
            'message' => 'data pesan berhasil dihapus',
            'data'    => $pesan
        ], 200);
    }
}
