<?php

namespace App\Http\Controllers;
use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        $like = like::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data like',
            'data'    => $like
        ], 200);
    }

    public function show($id)
    {
        $like = like::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data like',
            'data'    => $like
        ], 200);
    }

    public function store(Request $request)
    {
        $like = like::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_artikel' => $request->id_artikel,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data like berhasil disimpan',
            'data'    => $like
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $like = like::findOrfail($id);
        $like->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data like berhasil diupdate',
            'data'    => $like
        ], 200);
    }

    public function destroy($id)
    {
        $like = like::findOrfail($id);
        $like->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data like berhasil dihapus',
            'data'    => $like
        ], 200);
    }
}
