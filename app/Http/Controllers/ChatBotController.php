<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatBotController extends Controller
{
    public function index()
    {
        // ChatBot untuk mahasiswa
        $context = session()->get('chat', [['role' => 'assistant', 'content' => 'Halo Mahasiswa! Ada yang bisa saya bantu?']]);
        return view('chatBot', compact('context'));
    }

    public function umkmIndex()
    {
        // ChatBot untuk UMKM
        $context = session()->get('chat_umkm', [['role' => 'assistant', 'content' => 'Halo UMKM! Ada yang bisa saya bantu?']]);
        return view('umkm.chatbot.index', compact('context'));
    }

    public function processChat(Request $request)
    {
        $content = $request->input('content');
        
        // Validasi apakah input kosong
        if (empty($content)) {
            $route = $request->route()->named('umkm.chatbot.send') ? 'umkm.chatbot' : 'mahasiswa.chatbot';
            return redirect()->route($route)->with('error', 'Pesan tidak boleh kosong.');
        }

        // Tentukan apakah pengguna berasal dari mahasiswa atau UMKM
        $isUmkm = $request->route()->named('umkm.chatbot.send');
        $sessionKey = $isUmkm ? 'chat_umkm' : 'chat';

        // Dapatkan sesi percakapan atau inisialisasi jika belum ada
        $context = session()->get($sessionKey, [['role' => 'assistant', 'content' => $isUmkm ? 'Halo UMKM! Ada yang bisa saya bantu?' : 'Halo Mahasiswa! Ada yang bisa saya bantu?']]);
        
        // Tambahkan pesan pengguna ke konteks
        $context[] = ['role' => 'user', 'content' => $content];

        // Ambil API Key dari .env
        $yourApiKey = env('OPENAI_API_KEY');
        if (!$yourApiKey) {
            $route = $isUmkm ? 'umkm.chatbot' : 'mahasiswa.chatbot';
            return redirect()->route($route)->with('error', 'API Key tidak ditemukan.');
        }

        // Buat client OpenAI
        $client = OpenAI::client($yourApiKey);

        // Kirim konteks ke API ChatGPT
        $response = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => $context
        ]);

        // Tambahkan respon ChatGPT ke konteks sebagai asisten
        foreach ($response->choices as $result) {
            $context[] = ['role' => 'assistant', 'content' => $result->message->content];
        }

        // Simpan konteks percakapan di sesi
        session([$sessionKey => $context]);

        $route = $isUmkm ? 'umkm.chatbot' : 'mahasiswa.chatbot';
        return redirect()->route($route);
    }
}