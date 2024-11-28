<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        $users = User::where('role', 'UMKM')->get();
        return view('superadmin.project.index', compact('users'));
    }


    // Mengambil data untuk DataTables
    public function data()
    {
        $pekerjaan = pekerjaan::with('user')->select('table_pekerjaan.*');
        return DataTables::of($pekerjaan)
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-warning btn-sm" onclick="openModal(' . $row->id . ')">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deletePekerjaan(' . $row->id . ')">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat_bekerja' => 'required|string|max:255',
            'kategori' => 'required|in:Agrikultur,Akuntansi,Edukasi,Kesehatan,Lingkungan,Kreatif,Finance,Teknologi,Sosial,Lainnya,Marketing',
            'status' => 'required|in:archive,active'
        ]);

        pekerjaan::create($validated);
        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    // Mengambil data pekerjaan untuk diedit
    public function show($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);
        return response()->json($pekerjaan);
    }

    // Mengupdate data yang ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat_bekerja' => 'required|string|max:255',
            'kategori' => 'required|in:Agrikultur,Akuntansi,Edukasi,Kesehatan,Lingkungan,Kreatif,Finance,Teknologi,Sosial,Lainnya,Marketing',
            'status' => 'required|in:archive,active'
        ]);

        $pekerjaan = pekerjaan::findOrFail($id);
        $pekerjaan->update($validated);
        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    // Menghapus data
    public function delete($id)
    {
        pekerjaan::destroy($id);
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
