<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data comment',
            'data'    => $comment
        ], 200);
    }

    public function show($id)
    {
        $comment = Comment::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data comment',
            'data'    => $comment
        ], 200);
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_umkm' => $request->id_umkm,
            'id_artikel' => $request->id_artikel,
            'status' => $request->status,
            'dokumen' => $request->dokumen,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data comment berhasil disimpan',
            'data'    => $comment
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrfail($id);
        $comment->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data comment berhasil diupdate',
            'data'    => $comment
        ], 200);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrfail($id);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data comment berhasil dihapus',
        ], 200);
    }

}
