<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mahasiswa;
use App\Models\apply;

use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function sendCertificate($userId)
    {
        // Ambil data user
        $user = User::find($userId);
        if (!$user) {
            return back()->with('error', 'User not found');
        }

        // Load template sertifikat
        $templatePath = public_path('certificate/sertifikat.png');
        $certificatePath = public_path('certificate/' . $user->id . '_certificate.png');

        // Buat gambar dari template
        $image = imagecreatefrompng($templatePath);

        // Tentukan warna untuk teks (hitam dalam hal ini)
        $black = imagecolorallocate($image, 0, 0, 0);
        // Tentukan font yang akan digunakan dan ukuran
        $fontPath = public_path('fonts/Roboto-Regular.ttf');
        $fontSize = 48;

        // Tentukan posisi x dan y untuk menempatkan teks
        // Sesuaikan posisi x dan y berdasarkan gambar
        $x = 740; // Posisi horizontal (sesuaikan dengan garis)
        $y = 740; // Posisi vertikal (atur di atas garis)

        // Tambahkan nama pengguna ke gambar
        // Pastikan untuk menyesuaikan posisi x dan y sesuai dengan layout template
        imagettftext($image, $fontSize, 0, $x, $y, $black, $fontPath, $user->name);

        // Simpan gambar yang telah diedit
        imagepng($image, $certificatePath);
        imagedestroy($image); // Bebaskan memori

        // Kirim email dengan sertifikat terlampir
        Mail::send('emails.certificate', ['user' => $user], function ($message) use ($user, $certificatePath) {
            $message->to($user->email);
            $message->subject('Your Certificate of Achievement');
            $message->attach($certificatePath);
        });

        return back()->with('success', 'Certificate sent to ' . $user->email);
    }

    public function completedProjects()
    {
        $mahasiswa = mahasiswa::whereHas('user.apply', function ($query) {
            $query->where('status', 'completed');
        })->with(['user.apply' => function ($query) {
            $query->where('status', 'completed');
        }])->get();

        return view('superadmin.manage.index', ['mahasiswa' => $mahasiswa]);
    }
}
