<?php

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MahasiswaCheck;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ChatBotController;


Route::get('/send-email', function () {
    Mail::to('ridho.aulia7324@gmail.com')->send(new TestEmail());
    return 'Email telah dikirim!';
});

// Api
Route::get('/api/provinces', function () {
    return File::get(public_path('api_daerah/provinces.json'));
});

Route::get('/api/regencies/{province_id}', function ($province_id) {
    $data = json_decode(File::get(public_path('api_daerah/regencies.json')), true);
    return collect($data)->where('province_id', $province_id)->values();
});

Route::get('/api/districts/{regency_id}', function ($regency_id) {
    $data = json_decode(File::get(public_path('api_daerah/districts.json')), true);
    return collect($data)->where('regency_id', $regency_id)->values();
});

// Middleware untuk mahasiswa
Route::middleware(['auth', RoleMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('/mahasiswa', [IndexController::class, 'getDataUmkm'])->name('mahasiswa.dashboard');

    Route::get('/mahasiswa/chat', function () {
        return redirect()->route(config('chatify.routes.prefix'));  // Redirects to /
    })->name('mahasiswa.chat');

    Route::post('/apply/store', [ApplyController::class, 'store'])->name('apply.store');

    Route::get('/mahasiswa/chatbot', [ChatBotController::class, 'index'])->name('mahasiswa.chatbot');
    Route::post('/mahasiswa/chatbot/send', [ChatBotController::class, 'processChat'])->name('mahasiswa.chatbot.send');

});

// Middleware untuk umkm
Route::middleware(['auth', RoleMiddleware::class . ':umkm'])->group(function () {
    // Route untuk UMKM
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
    // Route untuk Artikel
    Route::get('/umkm/artikel', [UmkmController::class, 'indexArtikel'])->name('umkm.artikel.index');
    Route::get('/umkm/artikel/create', [UmkmController::class, 'createArtikel'])->name('umkm.artikel.create');
    Route::post('/umkm/artikel', [UmkmController::class, 'storeArtikel'])->name('umkm.artikel.store');
    Route::get('/umkm/artikel/{id}', [UmkmController::class, 'showArtikel'])->name('umkm.artikel.show');
    Route::get('/umkm/artikel/{id}/edit', [UmkmController::class, 'editArtikel'])->name('umkm.artikel.edit');
    Route::put('/umkm/artikel/{id}', [UmkmController::class, 'updateArtikel'])->name('umkm.artikel.update');
    Route::delete('/umkm/artikel/{id}', [UmkmController::class, 'destroyArtikel'])->name('umkm.artikel.destroy');
    // konsultasi
    Route::get('/umkm/konsultasi', [KonsultasiController::class, 'index'])->name('umkm.konsultasi.index');
    Route::get('/umkm/konsultasi/create', [KonsultasiController::class, 'create'])->name('umkm.konsultasi.create');
    Route::post('/umkm/konsultasi', [KonsultasiController::class, 'store'])->name('umkm.konsultasi.store');
    Route::get('/umkm/konsultasi/{id}', [KonsultasiController::class, 'show'])->name('umkm.konsultasi.show');
    Route::get('/umkm/konsultasi/{id}/edit', [KonsultasiController::class, 'edit'])->name('umkm.konsultasi.edit');
    Route::put('/umkm/konsultasi/{id}', [KonsultasiController::class, 'update'])->name('umkm.konsultasi.update');
    Route::delete('/umkm/konsultasi/{id}', [KonsultasiController::class, 'destroy'])->name('umkm.konsultasi.destroy');
    // Route untuk Pekerjaan
    Route::get('/umkm/pekerjaan', [PekerjaanController::class, 'index'])->name('umkm.pekerjaan.index');
    Route::get('/umkm/pekerjaan/create', [PekerjaanController::class, 'create'])->name('umkm.pekerjaan.create');
    Route::post('/umkm/pekerjaan', [PekerjaanController::class, 'store'])->name('umkm.pekerjaan.store');
    Route::get('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'show'])->name('umkm.pekerjaan.show');
    Route::get('/umkm/pekerjaan/{id}/edit', [PekerjaanController::class, 'edit'])->name('umkm.pekerjaan.edit');
    Route::put('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'update'])->name('umkm.pekerjaan.update');
    Route::delete('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'destroy'])->name('umkm.pekerjaan.destroy');
    Route::patch('/umkm/pekerjaan/{id}/archive', [PekerjaanController::class, 'archive'])->name('umkm.pekerjaan.archive');
    Route::patch('/umkm/pekerjaan/{id}/unarchive', [PekerjaanController::class, 'unarchive'])->name('umkm.pekerjaan.unarchive');

     // Route ChatBot untuk UMKM
     Route::get('/umkm/chatbot', [ChatBotController::class, 'umkmIndex'])->name('umkm.chatbot');
     Route::post('/umkm/chatbot/send', [ChatBotController::class, 'processChat'])->name('umkm.chatbot.send');

    Route::get('/umkm/chat', function () {
        return redirect()->route(config('chatify.routes.prefix'));  // Redirects to /
    })->name('umkm.chat');

    // manage project
    Route::get('/umkm/manage', [ApplyController::class, 'manageProject'])->name('umkm.manage');
    Route::post('/umkm/manage/update-status', [ApplyController::class, 'updateStatusManage'])->name('apply.updateStatus');

    Route::get('/umkm/lamaran', [ApplyController::class, 'index'])->name('lamaran.index');
    Route::post('/umkm/lamaran/update-status', [ApplyController::class, 'updateStatus'])->name('lamaran.updateStatus');
});

// Middleware untuk superadmin
Route::middleware(['auth', RoleMiddleware::class . ':superadmin'])->group(function () {
    Route::get('/superadmin', function () {
        return view('superadmin.index');
    })->name('superadmin.dashboard');
// mahasiswa
    Route::get('/superadmin/mahasiswa', [SuperadminController::class, 'indexMahasiswa'])->name('superadmin.mahasiswa');
    Route::get('/superadmin/mahasiswa/create', [SuperadminController::class, 'createMahasiswa'])->name('superadmin.mahasiswa.create');
    Route::post('/superadmin/mahasiswa', [SuperadminController::class, 'storeMahasiswa'])->name('superadmin.mahasiswa.store');
    Route::get('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'showMahasiswa'])->name('superadmin.mahasiswa.show');
    Route::get('/superadmin/mahasiswa/{id}/edit', [SuperadminController::class, 'editMahasiswa'])->name('superadmin.mahasiswa.edit');
    Route::put('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'updateMahasiswa'])->name('superadmin.mahasiswa.update');
    Route::delete('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'destroyMahasiswa'])->name('superadmin.mahasiswa.destroy');
    // umkm
    Route::get('/superadmin/umkm', [SuperadminController::class, 'indexUmkm'])->name('superadmin.umkm');
    Route::get('/superadmin/umkm/create', [SuperadminController::class, 'createUmkm'])->name('superadmin.umkm.create');
    Route::post('/superadmin/umkm', [SuperadminController::class, 'storeUmkm'])->name('superadmin.umkm.store');
    Route::get('/superadmin/umkm/{id}', [SuperadminController::class, 'showUmkm'])->name('superadmin.umkm.show');
    Route::get('/superadmin/umkm/{id}/edit', [SuperadminController::class, 'editUmkm'])->name('superadmin.umkm.edit');
    Route::put('/superadmin/umkm/{id}', [SuperadminController::class, 'updateUmkm'])->name('superadmin.umkm.update');
    Route::delete('/superadmin/umkm/{id}', [SuperadminController::class, 'destroyUmkm'])->name('superadmin.umkm.destroy');
    Route::get('/superadmin/verifikasi', [SuperAdminController::class, 'verifikasiUmkm'])->name('superadmin.verifikasi');
    Route::put('/superadmin/umkm/{id}/verify', [SuperAdminController::class, 'verify'])->name('superadmin.umkm.verify');
    Route::get('/superadmin/umkm/tinjau/{id}',[SuperAdminController::class, 'tinjau'])->name('superadmin.umkm.tinjau');

    // artikel
    Route::get('/superadmin/artikel', [SuperAdminController::class, 'indexArtikel'])->name('superadmin.artikel.index');
    Route::get('/superadmin/artikel/create', [SuperAdminController::class, 'createArtikel'])->name('superadmin.artikel.create');
    Route::post('/superadmin/artikel', [SuperAdminController::class, 'storeArtikel'])->name('superadmin.artikel.store');
    Route::get('/superadmin/artikel/{id}', [SuperAdminController::class, 'showArtikel'])->name('superadmin.artikel.show');
    Route::get('/superadmin/artikel/{id}/edit', [SuperAdminController::class, 'editArtikel'])->name('superadmin.artikel.edit');
    Route::put('/superadmin/artikel/{id}', [SuperAdminController::class, 'updateArtikel'])->name('superadmin.artikel.update');
    Route::delete('/superadmin/artikel/{id}', [SuperAdminController::class, 'destroyArtikel'])->name('superadmin.artikel.destroy');

    // konsultasi
    Route::get('/superadmin/konsultasi', [KonsultasiController::class, 'indexall'])->name('superadmin.konsultasi');
    Route::get('/superadmin/konsultasi/{id}', [KonsultasiController::class, 'showadmin'])->name('superadmin.konsultasi.show');
    Route::put('/konsultasi/{id}/jawaban', [KonsultasiController::class, 'updateJawaban'])->name('superadmin.konsultasi.updateJawaban');

    Route::get('/superadmin/chat', function () {
        return redirect()->route(config('chatify.routes.prefix'));  // Redirects to /
    })->name('superadmin.chat');
    // Route manage project mahasisw
    Route::get('/send-certificate/{id}', [CertificateController::class, 'sendCertificate'])->name('sertifikat.superadmin');
    Route::get('/superadmin/manage', [CertificateController::class, 'completedProjects'])->name('superadmin.manage');

    // GANTI PASSWORD
    Route::post('superadmin/password/update', [SuperAdminController::class, 'updatePassword'])->name('password.update');
    Route::get('superadmin/password', [SuperAdminController::class, 'gantipass'])->name('password');

    // Project
    Route::get('/pekerjaan', [ProjectController::class, 'index'])->name('pekerjaan.index');
    Route::get('/pekerjaan/data', [ProjectController::class, 'data'])->name('pekerjaan.data');
    Route::post('/pekerjaan/store', [ProjectController::class, 'store'])->name('pekerjaan.store');
    Route::get('/pekerjaan/{id}', [ProjectController::class, 'show'])->name('pekerjaan.show');
    Route::put('/pekerjaan/update/{id}', [ProjectController::class, 'update'])->name('pekerjaan.update');
    Route::delete('/pekerjaan/delete/{id}', [ProjectController::class, 'delete'])->name('pekerjaan.delete');

});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);

// beranda
Route::get('/', [IndexController::class,'getDataUmkm'])->name('index');
Route::get('/event', [IndexController::class, 'getDataEvent'])->name('event');
Route::get('/artikel/{id}', [IndexController::class, 'showArtikel'])->name('event.detail');
Route::get('/mahasiswa/pekerjaan', [IndexController::class, 'getDataProject'])->name('mahasiswa.pekerjaan');

// Profile
Route::get('/mahasiswa/profile', [IndexController::class, 'getDataProfilMahasiswa'])->name('mahasiswa.profile');
Route::get('/mahasiswa/edit/{id}', [IndexController::class, 'editProfile'])->name('mahasiswa.profile.edit');
Route::put('/mahasiswa/{id}', [IndexController::class, 'updateProfile'])->name('mahasiswa.profile.update');
Route::put  ('/mahasiswa/profile/bio', [IndexController::class, 'updateBio'])->name('mahasiswa.bio.update');
Route::post('/mahasiswa/achievement', [IndexController::class, 'store'])->name('mahasiswa.achievement.store');


Route::get('/mahasiswa/pekerjaan/{category}', [IndexController::class, 'getDataProjectByCategory'])->name('mahasiswa.pekerjaan.category');
Route::get('/mahasiswa/detail', [PekerjaanController::class, 'getAllDataProject'])->name('show.all.pekerjaan');
Route::get('/mahasiswa/pekerjaan/show/{id}', [IndexController::class, 'showProject'])->name('mahasiswa.pekerjaan.show');
Route::get('/index/umkm', [IndexController::class, 'indexUmkm'])->name('umkm.index.beranda');
Route::get('/index/umkm/{id}', [IndexController::class, 'showUmkm'])->name('umkm.show');
Route::get('/check-login', [AuthController::class, 'checkLogin'])->name('check.login');

// AUTH
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/registerumkm', function () {
    return view('auth.registerumkm');
})->name('registerumkm');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');
Route::post('/registermahasiswa', [AuthController::class, 'registermahasiswa'])->name('registermahasiswa');
Route::post('/registerumkm', [AuthController::class, 'registerumkm'])->name('umkmregister');


// // Route untuk chat
// Route::post('/send-message', [ChatController::class, 'sendMessage']);
// Route::get('/fetch-messages/{id_receiver}', [ChatController::class, 'fetchMessages']);