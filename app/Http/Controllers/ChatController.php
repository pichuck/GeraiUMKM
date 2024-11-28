<?php

namespace App\Http\Controllers;
use App\Models\chat;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_receiver' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        $chat = Chat::create([
            'id_sender' => Auth::id(),
            'id_receiver' => $request->id_receiver,
            'pesan' => $request->message,
            'tanggal' => now(),
            'is_read' => false,
        ]);

        // Broadcast pesan dengan event
        broadcast(new MessageSent($chat))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }

    public function fetchMessages($id_receiver)
    {
        // Ambil pesan antara pengguna yang login dan penerima (receiver)
        $messages = Chat::where(function ($query) use ($id_receiver) {
            $query->where('id_sender', Auth::id())
                ->where('id_receiver', $id_receiver);
        })->orWhere(function ($query) use ($id_receiver) {
            $query->where('id_sender', $id_receiver)
                ->where('id_receiver', Auth::id());
        })->get();

        return response()->json($messages);
    }

    public function showChat($receiverId)
    {
        return view('chat', ['receiverId' => $receiverId]);
    }

}
